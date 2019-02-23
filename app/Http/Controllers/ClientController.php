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
        $address = $_POST['address'];
        $phone_no = $_POST['phone_no'];
        $state_code_id = $_POST['state_code_id'];

        Client::create([
            'NAME' => $name,
            'IC_NO' => $ic_no,
            'ADDRESS' => $address,
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

    function StateCode()
    {
    }
}
