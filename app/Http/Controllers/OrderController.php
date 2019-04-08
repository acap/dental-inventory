<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Event\OrderCompletedEvent;
use App\Http\Event\OrderCreatedEvent;
use App\Http\Model\Client;
use App\Http\Model\Configuration;
use App\Http\Model\Order;
use App\Http\Model\OrderItem;
use App\Http\Model\StockCode;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Konekt\PdfInvoice\InvoicePrinter;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xls;


class OrderController extends Controller
{

    function list()
    {
        //this is eloquent see the db statement
        // Order is model dia ambk smue
        $orders = Order::all();
        return view("orders.list")->with('result', $orders);
    }

    function add()
    {
        $clients = Client::all();
        return view("orders.add")
            ->with("clients", $clients);
    }

    function post_add()
    {

        $clientId = $_POST['client_id'];
        $dateDelivery = $_POST['date_delivery'];

        $max = Order::count('ID');
        $next = (intval($max) ?: 0) + 1;
        $generatedOrderNo = "ORD-{$next}";


        $order = Order::create([
            'CLIENT_ID' => $clientId,
            'ORDER_NO' => $generatedOrderNo,
            'DESCRIPTION' => 'asdasd',
            'DATE_DELIVERY' => Carbon::createFromFormat('m/d/Y', $dateDelivery),
            'STATUS' => 1
        ]);

        event(new OrderCreatedEvent($order));

        return redirect("orders/list");
    }

    function complete($orderNo)
    {
        info("completing order no : " . $orderNo);

        try {
            DB::connection()->beginTransaction();

            $order = Order::where('ORDER_NO', "=", $orderNo)
                ->first();
            $order->update([
                'STATUS' => 3
            ]);
            event(new OrderCompletedEvent($order));

            DB::connection()->commit();
        } catch (\Exception $e) {
            DB::connection()->rollBack();
            Session::flash("error", "Error occurred");
            return redirect("errors/");
        }

        Session::flash("success", "Order " . $orderNo . " is completed");

        return redirect("orders/list");
    }

    function edit($orderNo)
    {
        info("order no : " . $orderNo);
        $clients = Client::all();
        $order = Order::where('ORDER_NO', "=", $orderNo)
            ->first();

        return view("orders.edit")
            ->with("order", $order)
            ->with("clients", $clients);
    }

    function post_edit()
    {
        $orderNo = $_POST['order_no'];
        $status = $_POST['status'];
        $description = $_POST['description'];
        $deposit = $_POST['deposit'];
        $dateDelivery = $_POST['date_delivery'];

        info("orderNo: " . $orderNo);
        info("status: " . $status);
        info("date: " . $dateDelivery);
//        info($dateDelivery);

        try {
            DB::connection()->beginTransaction();

            $order = Order::where("ORDER_NO", "=", $orderNo)->first();
            $order->update([
                'DESCRIPTION' => $description,
                'DATE_DELIVERY' => Carbon::createFromFormat('d/m/Y', $dateDelivery),
                'STATUS' => $status,
                'DEPOSIT' => $deposit
            ]);

            DB::connection()->commit();
        } catch (\Exception $e) {
            info($e);
            DB::connection()->rollBack();
            return redirect("errors/");
        }
        return redirect("orders/list");
    }

    function detail($orderNo)
    {
        info("order no : " . $orderNo);
        $order = Order::where('ORDER_NO', "=", $orderNo)
            ->first();
        $orderItems = OrderItem::where('ORDER_ID', "=", $order->ID)
            ->get();
        $stockCodes = StockCode::all();

        return view("orders.detail")
            ->with("order", $order)
            ->with("orderItems", $orderItems)
            ->with("stockCodes", $stockCodes);
    }

    function completed($orderNo)
    {

        $order = Order::find("ORDER_NO", $orderNo);
        //
        //
        //

        event(new OrderCompletedEvent($order));
    }

    function post_add_item($orderNo)
    {
        $stockCodeId = $_POST["stock_code_id"];
        $quantity = $_POST["quantity"];

        $stockCode = StockCode::find($stockCodeId);
        info("Stock Code: " . $stockCode->toJson());

        try {
            DB::connection()->beginTransaction();

            // find order
            $order = Order::where("ORDER_NO", "=", $orderNo)
                ->first();

            // create order item
            OrderItem::create([
                "ORDER_ID" => $order->ID,
                "STOCK_CODE_ID" => $stockCodeId,
                "QUANTITY" => $quantity,
                "AMOUNT" => $quantity * $stockCode->PRICE
            ]);

            // update total amount
            $newTotalAmount = $order->TOTAL_AMOUNT + ($quantity * $stockCode->PRICE);
            info("Updating total amount: " . $newTotalAmount);
            Order::where("ORDER_NO", "=", $orderNo)
                ->update([
                    'TOTAL_AMOUNT' => $newTotalAmount
                ]);

            DB::connection()->commit();
        } catch (\Exception $e) {
            DB::connection()->rollBack();
            return redirect("errors/");
        }

        return redirect("orders/detail/" . $orderNo);
    }

    function print($orderNo)
    {
        // find order
        $order = Order::where('ORDER_NO', "=", $orderNo)
            ->first();
        $orderItems = OrderItem::where('ORDER_ID', "=", $order->ID)
            ->get();

        $businessName = Configuration::where("KEY_", '=', "business.name")->first();
        $businessAddress1 = Configuration::where("KEY_", '=', "business.address1")->first();
        $businessAddress2 = Configuration::where("KEY_", '=', "business.address2")->first();
        $businessAddress3 = Configuration::where("KEY_", '=', "business.address3")->first();
        $businessPostcode = Configuration::where("KEY_", '=', "business.postcode")->first();
        $businessPhoneNo = Configuration::where("KEY_", '=', "business.phoneNo")->first();

        $invoice = new InvoicePrinter();
        /* Header settings */
//        $invoice->setLogo("images/sample1.jpg");   //logo image path
        $invoice->setColor("#007fff");      // pdf color scheme
        $invoice->setType("Sale Invoice");    // Invoice Type
        $invoice->setReference($order->ORDER_NO);   // Reference
        $invoice->setDate(date('M dS ,Y', time()));   //Billing Date
        $invoice->setTime(date('h:i:s A', time()));   //Billing Time
        $invoice->setDue(date('M dS ,Y', strtotime('+3 months')));    // Due Date
        $invoice->setFrom(array($businessName->VALUE_, $businessAddress1->VALUE_, $businessAddress2->VALUE_, $businessAddress3->VALUE_, $businessPostcode->VALUE_, $businessPhoneNo->VALUE_));
        $invoice->setTo(array($order->client->NAME, $order->client->ADDRESS, "128 AA Juanita Ave", "Glendora , CA 91740"));

        foreach ($orderItems as $orderItem)
            $invoice->addItem($orderItem->stockCode->CODE, $orderItem->stockCode->DESCRIPTION, $orderItem->QUANTITY, 0, $orderItem->stockCode->PRICE, 0, $orderItem->AMOUNT);

        $invoice->addTotal("Total", $order->TOTAL_AMOUNT);
        $invoice->addTotal("Deposit", $order->DEPOSIT);
        $invoice->addTotal("Total due", ($order->TOTAL_AMOUNT - $order->DEPOSIT), true);

        $invoice->addBadge("Payment Paid");
        $invoice->addTitle("Important Notice");
        $invoice->addParagraph("No item will be replaced or refunded if you don't have the invoice with you.");
        $invoice->setFooternote("My Company Name Here");
        $output = fopen("php://output", "w");
        $invoice->render("Invoice-" . $orderNo . ".pdf", "D");
    }

    function download()
    {
        $spreadsheet = new Spreadsheet();  /*----Spreadsheet object-----*/
        $Excel_writer = new Xls($spreadsheet);  /*----- Excel (Xls) Object*/
        $spreadsheet->setActiveSheetIndex(0);
        $activeSheet = $spreadsheet->getActiveSheet();

        $orders=Order::all();
        foreach ($orders as $a => $order){
            $activeSheet->setCellValue('A'. ($a+1), $order->ORDER_NO);
            $activeSheet->setCellValue('B'. ($a+1), $order->TOTAL_AMOUNT);
            $activeSheet->setCellValue('C'. ($a+1), $order->DEPOSIT);
            $activeSheet->setCellValue('D'. ($a+1), $order->DESCRIPTION);
            $activeSheet->setCellValue('E'. ($a+1), $order->DATE_DELIVERY);
            $activeSheet->setCellValue('F'. ($a+1), $order->STATUS);
        }

        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="' . 'order_list' . '.xls"'); /*-- $filename is  xsl filename ---*/
        header('Cache-Control: max-age=0');
        $Excel_writer->save('php://output');

    }
}
