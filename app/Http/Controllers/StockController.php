<?php

namespace App\Http\Controllers;


use App\Http\Model\Stock;
use App\Http\Model\StockEntry;
use App\Http\Model\StockCode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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

    function download_moq(){
        info('downloading moq report');

        // create excel
        $spreadsheet = new Spreadsheet();
        $xls = new Xls($spreadsheet);
        $spreadsheet->setActiveSheetIndex(0);
        $activeSheet = $spreadsheet->getActiveSheet();

        // take all the information and
        // select * FROM di_stock s
        // left join di_stock_code sc on sc.id = s.STOCK_CODE_ID
        // where quantity > MOQ
        $moqList = DB::table("di_stock")
            ->select('di_stock_code.CODE', 'di_stock_code.DESCRIPTION', 'di_stock.QUANTITY', 'di_stock_code.MOQ',
                "di_vendor.COMPANY_NAME", "di_vendor.PHONE_NO")
            ->join("di_stock_code", "di_stock_code.ID", "=", "di_stock.STOCK_CODE_ID")
            ->join("di_vendor", "di_vendor.ID", "=", "di_stock_code.VENDOR_ID")
            ->where("di_stock.QUANTITY", "<", "di_stock_code.MOQ")
            ->get();

        $newDate = date("d-m-Y");
        $activeSheet->setCellValue('A1' , "LIST OF STOCK BELOW MINIMUM ORDER QUANITY  AS OF " .$newDate);
        // header
        $activeSheet->setCellValue('A2' , "CODE");
        $activeSheet->setCellValue('B2' , "DESCRIPTION");
        $activeSheet->setCellValue('C2' , "QUANTITY");
        $activeSheet->setCellValue('D2' , "MOQ");
        $activeSheet->setCellValue('E2' , "COMPANY NAME");
        $activeSheet->setCellValue('F2' , "PHONE NO");

        foreach ($moqList as $a=>$moq){
            $activeSheet->setCellValue('A' .($a+4) , $moq->CODE);
            $activeSheet->setCellValue('B' .($a+4) , $moq->DESCRIPTION);
            $activeSheet->setCellValue('C' .($a+4) , $moq->QUANTITY);
            $activeSheet->setCellValue('D' .($a+4) , $moq->MOQ);
            $activeSheet->setCellValue('E' .($a+4) , $moq->COMPANY_NAME);
            $activeSheet->setCellValue('F' .($a+4) , $moq->PHONE_NO);
        }

        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="moq_list_2.xls"');
        header('Cache-Control: max-age=0');
        $xls->save('php://output');

        return redirect('stocks/list');
    }
}
