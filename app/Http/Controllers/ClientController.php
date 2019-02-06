<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 3/2/2019
 * Time: 10:02 PM
 */

namespace App\Http\Controllers;


use App\Http\Model\Client;

class ClientController extends Controller
{
    function add()
    {
        return view('clients/add');
    }

    function post_add()
    {
        $name = $_POST['name'];
        $ic_no = $_POST['ic_no'];
        $address = $_POST['address'];
        $phone_no = $_POST['phone_no'];

        Client::create([
            'NAME' => $name,
            'IC_NO' => $ic_no,
            'ADDRESS' => $address,
            'PHONE_NO' => $phone_no,
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
