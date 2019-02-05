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
        $stockCodeList = StockCode::all();
        return view("stockCodes.list")->with('stockCodeList', $stockCodeList);
    }

    function add()
    {
        return view('stockCodes/add');
    }

    function post_add()
    {
        $code = $_POST['code'];
        $description = $_POST['description'];

        StockCode::create([
            'CODE'=> $code,
            'DESCRIPTION'=>$description
        ]);

        return redirect('stockCodes/list');
    }

}