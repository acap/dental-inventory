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
        $detail = Client::where('IC_NO', "=", $icNo)->first();
        return view("clients.detail")
            ->with('client', $detail);
    }

}
