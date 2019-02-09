<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Model\DentalOrder;
use App\Http\Model\OrderItem;
use App\Http\Model\StockCode;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Konekt\PdfInvoice\InvoicePrinter;


class OrderController extends Controller
{

    function list()
    {
        //this is eloquent see the db statement
        $orders = DentalOrder::all();
        return view("orders.list")->with('result', $orders);
    }

    function add()
    {
        return view("orders.add");
    }

    function post_add()
    {
        $orderNumber = $_POST['order_no'];
        $name = $_POST['name'];
        $totalAmount = $_POST['total_amount'];
//        $description = $_POST['description'];
//        $dateDelivery = $_POST['date_delivery'];

        info($orderNumber);
        info($name);
        info($totalAmount);
//        info($dateDelivery);

        DentalOrder::create([
            'ORDER_NO' => $orderNumber,
            'NAME' => $name,
            'TOTAL_AMOUNT' => $totalAmount,
            'DESCRIPTION' => 'asdasd',
            'DATE_DELIVERY' => Carbon::createFromFormat('d/m/Y', '11/06/1990'),
            'STATUS' => 1
        ]);

        return redirect("orders/list");
    }

    function edit($orderNo)
    {
        info("order no : " . $orderNo);
        $order = DentalOrder::where('ORDER_NO', "=", $orderNo)
            ->first();

        return view("orders.edit")
            ->with("order", $order);
    }

    function post_edit()
    {
        $orderNo = $_POST['order_no'];
        $name = $_POST['name'];
        $totalAmount = $_POST['total_amount'];
        $status = $_POST['status'];
//        $description = $_POST['description'];
//        $dateDelivery = $_POST['date_delivery'];

        info($orderNo);
        info($name);
        info($totalAmount);
//        info($dateDelivery);

        $order = DentalOrder::where("ORDER_NO", "=", $orderNo);

        $order->update([
            'NAME' => $name,
            'TOTAL_AMOUNT' => $totalAmount,
            'DESCRIPTION' => 'asdasd',
            'DATE_DELIVERY' => Carbon::createFromFormat('d/m/Y', '11/06/1990'),
            'STATUS' => $status
        ]);

        return redirect("orders/list");
    }

    function detail($orderNo)
    {
        info("order no : " . $orderNo);
        $order = DentalOrder::where('ORDER_NO', "=", $orderNo)
            ->first();
        $orderItems = OrderItem::where('ORDER_ID', "=", $order->ID)
            ->get();
        $stockCodes = StockCode::all();

        return view("orders.detail")
            ->with("order", $order)
            ->with("orderItems", $orderItems)
            ->with("stockCodes", $stockCodes);
    }


    function post_add_item($orderNo)
    {
        $stockCodeId = $_POST['stock_code_id'];
        $quantity = $_POST['quantity'];
        $order = DentalOrder::where('ORDER_NO', "=", $orderNo)
            ->first();
        OrderItem::create([
            'ORDER_ID' => $order->ID,
            'STOCK_CODE_ID' => $stockCodeId,
            'QUANTITY' => $quantity
        ]);
        return redirect("orders/detail/" . $orderNo);
    }

    function print($orderNo){
        $invoice = new InvoicePrinter();
        /* Header settings */
//        $invoice->setLogo("images/sample1.jpg");   //logo image path
        $invoice->setColor("#007fff");      // pdf color scheme
        $invoice->setType("Sale Invoice");    // Invoice Type
        $invoice->setReference("INV-55033645");   // Reference
        $invoice->setDate(date('M dS ,Y',time()));   //Billing Date
        $invoice->setTime(date('h:i:s A',time()));   //Billing Time
        $invoice->setDue(date('M dS ,Y',strtotime('+3 months')));    // Due Date
        $invoice->setFrom(array("Seller Name","Sample Company Name","128 AA Juanita Ave","Glendora , CA 91740"));
        $invoice->setTo(array("Purchaser Name","Sample Company Name","128 AA Juanita Ave","Glendora , CA 91740"));

        $invoice->addItem("AMD Athlon X2DC-7450","2.4GHz/1GB/160GB/SMP-DVD/VB",6,0,580,0,3480);
        $invoice->addItem("PDC-E5300","2.6GHz/1GB/320GB/SMP-DVD/FDD/VB",4,0,645,0,2580);
        $invoice->addItem('LG 18.5" WLCD',"",10,0,230,0,2300);
        $invoice->addItem("HP LaserJet 5200","",1,0,1100,0,1100);

        $invoice->addTotal("Total",9460);
        $invoice->addTotal("VAT 21%",1986.6);
        $invoice->addTotal("Total due",11446.6,true);

        $invoice->addBadge("Payment Paid");
        $invoice->addTitle("Important Notice");
        $invoice->addParagraph("No item will be replaced or refunded if you don't have the invoice with you.");
        $invoice->setFooternote("My Company Name Here");
        $output = fopen('php://output', 'w');
        $invoice->render('example1.pdf','D');
    }
}
