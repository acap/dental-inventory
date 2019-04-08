<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 3/2/2019
 * Time: 10:02 PM
 */

namespace App\Http\Controllers;


use App\Http\Model\Client;
use App\Http\Model\StateCode;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xls;

class ClientController extends Controller
{
    function add()
    {
        $stateCodes = StateCode:: all();
        return view('clients/add')
            ->with("xxx", $stateCodes);
    }

    function post_add()
    {
        $name = $_POST['name'];
        $ic_no = $_POST['ic_no'];
        $address1 = $_POST['address1'];
        $address2 = $_POST['address2'];
        $address3 = $_POST['address3'];
        $postcode = $_POST['postcode'];
        $phone_no = $_POST['phone_no'];
        $state_code_id = $_POST['state_code_id'];

        Client::create([
            'NAME' => $name,
            'IC_NO' => $ic_no,
            'ADDRESS1' => $address1,
            'ADDRESS2' => $address2,
            'ADDRESS3' => $address3,
            'POSTCODE' => $postcode,
            'PHONE_NO' => $phone_no,
            'STATE_CODE_ID' => $state_code_id
        ]);

        return redirect('clients/list');
    }

    function list()
    {
        $clientList = Client::all();
        return view('/clients/list')
            ->with('clientList', $clientList);
    }

    function detail($icNo)
    {
        info("ic number : " . $icNo);
        $client = Client::where('IC_NO', "=", $icNo)->first();
        return view("clients.detail")
            ->with('client', $client);
    }

    function download(){
        $spreadsheet = new Spreadsheet();
        $xls = new Xls($spreadsheet);
        $spreadsheet->setActiveSheetIndex(0);
        $activeSheet = $spreadsheet->getActiveSheet();

        // take all the information and
        $clients = Client::all();
        $activeSheet->setCellValue('A1', 'NAME')->getStyle('A1')->getFont()->setBold(true)->getColor()->setARGB('BLACK');
        $activeSheet->setCellValue('B1','IC NUMBER')->getStyle('B1')->getFont()->setBold(true);
        $activeSheet->setCellValue('C1','ADDRESS')->getStyle('C1')->getFont()->setBold(true);
        $activeSheet->setCellValue('D1','ADDRESS')->getStyle('D1')->getFont()->setBold(true);
        $activeSheet->setCellValue('E1','ADDRESS')->getStyle('E1')->getFont()->setBold(true);
        $activeSheet->setCellValue('F1','PHONE NUMBER')->getStyle('F1')->getFont()->setBold(true);
        $activeSheet->setCellValue('G1','POSTCODE')->getStyle('G1')->getFont()->setBold(true);
        $activeSheet->setCellValue('H1','STATE')->getStyle('H1')->getFont()->setBold(true);
        foreach ($clients as $a=>$client){
            $activeSheet->setCellValue('A' .(1+$a+1) , $client->NAME);
            $activeSheet->setCellValue('B' .(1+($a+1)) , $client->IC_NO);
            $activeSheet->setCellValue('C' .(1+($a+1)) , $client->ADDRESS1);
            $activeSheet->setCellValue('D' .(1+($a+1)) , $client->ADDRESS2);
            $activeSheet->setCellValue('E' .(1+($a+1)) , $client->ADDRESS3);
            $activeSheet->setCellValue('F' .(1+($a+1)), $client->PHONE_NO);
            $activeSheet->setCellValue('G' .(1+($a+1)) , $client->POSTCODE);
            $activeSheet->setCellValue('H' .(1+($a+1)) , $client->STATE);
        }

        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="client_list.xls"');
        header('Cache-Control: max-age=0');
        $xls->save('php://output');

        return redirect('clients/list');
    }



}
