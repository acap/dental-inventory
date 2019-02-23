<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 3/2/2019
 * Time: 12:21 AM
 */

namespace App\Http\Controllers;


use App\Http\Model\StockCode;

class StockCodeController extends Controller
{
    function list()
    {
        // STOCKCODE NIE ADALAH MODAL YANG MANA DIA AMBK SMUE DATA DARI DB MGGUNAKAN MODAL sebagai penantaraan
        //RETURN NI LAK DIA CKP KEMBALIKN VIEW PAGE STOCKCODE LIST kat blade
        // WITH NIE ADALAH FUNCTION yang bawak apa kita nak
        $stockCodeList = StockCode::all();
        return view("stockCodes.list")
            ->with('stockCodeList', $stockCodeList);
    }

    function add()
    {
        return view('stockCodes/add');
    }

    function post_add()
    {
        $code = $_POST['code'];
        $description = $_POST['description'];
        $price = $_POST['price'];

        StockCode::create([
            'CODE'=> $code,
            'DESCRIPTION'=>$description,
            'PRICE'=>$price
        ]);

        return redirect('stockCodes/list');
    }

    function edit($code)
    {
        info("stock code no : " . $code);
        $stockCode = StockCode::where('CODE', "=", $code)
            ->first();

        return view("stockCodes.edit")
            ->with("stockCode", $stockCode);
    }

    function post_edit()
    {
        //DIA MSUKKN KEDALAM MODAL MANA MODAL ADALAH CONNECTION GN DB
        // VARIABLE
        // METHOD POST

        $code = $_POST['code'];
        $description = $_POST['description'];
        $price = $_POST['price'];

        $stockCode = StockCode::where("CODE", "=", $code);

        $stockCode->update([
            'DESCRIPTION'=>$description,
            'PRICE'=>$price
        ]);

        return redirect('stockCodes/list');
    }

    function destory($code)
    {
      $stockCode::find($code);
      $stockCode -> delete();

      return redirect('stockCodes/list');

    }
}