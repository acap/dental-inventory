<?php

namespace App\Http\Controllers;


use App\Http\Model\Stock;
use App\Http\Model\StockEntry;
use App\Http\Model\StockCode;
use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xls;

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
        StockEntry::create([
            'QUANTITY'=> $quantity,
            'STOCK_CODE_ID'=>$stockCodeId
        ]);

        return redirect('stocks/list');
    }

    function download(){
        info('downloading');
        // create excel
        $spreadsheet = new Spreadsheet();
        $xls = new Xls($spreadsheet);
        $spreadsheet->setActiveSheetIndex(0);
        $activeSheet = $spreadsheet->getActiveSheet();

        // take all the information and
        $stocks = Stock::all();
        foreach ($stocks as $a=>$stock){
            $activeSheet->setCellValue('A' .($a+1) , $stock->stockCode->CODE);
            $activeSheet->setCellValue('B' .($a+1) , $stock->QUANTITY);
        }

        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="stock_list.xls"');
        header('Cache-Control: max-age=0');
        $xls->save('php://output');

        return redirect('stocks/list');
    }
}
