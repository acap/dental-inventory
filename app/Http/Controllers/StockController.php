<?php

namespace App\Http\Controllers;


use App\Http\Model\Stock;
use App\Http\Model\StockCode;
use Illuminate\Http\Request;

class StockController extends Controller
{
    function list()
    {
        $stockList = Stock::all();
        return view("stocks.list")->with('stockList', $stockList);
    }

    function add()
    {
        $stockCodes = StockCode::all();
        return view('stocks/add')
            -> with('stockCodes', $stockCodes);
    }

    function post_add()
    {
        $quantity = $_POST['quantity'];
        $stockCodeId = $_POST['stock_code_id'];
        info($quantity);
        info($stockCodeId);
        Stock::create([
            'QUANTITY'=> $quantity,
            'STOCK_CODE_ID'=>$stockCodeId
        ]);

        return redirect('stocks/list');
    }

}