<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Model\DentalOrder;
use App\Http\Model\OrderItem;
use App\Http\Model\StockCode;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;


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

}
