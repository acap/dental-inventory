<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 23/3/2019
 * Time: 11:23 PM
 */

namespace App\Http\Controllers;


use App\Http\Model\StateCode;
use App\Http\Model\Vendor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VendorController extends Controller
{
    function add()
    {
        $stateCodes = StateCode::all();
        return view('/vendors/add')->with("xxx", $stateCodes);
    }

    function post_add()
    {
        info('post add ');
        $company_name = $_POST['company_name'];
        $contact_person_name = $_POST['contact_person_name'];
        $address1 = $_POST['address1'];
        $address2 = $_POST['address2'];
        $address3 = $_POST['address3'];
        $postcode = $_POST['postcode'];
        $phone_no = $_POST['phone_no'];
        $state_code_id = $_POST['state_code_id'];

        Vendor::create([
            'COMPANY_NAME' => $company_name,
            'CONTACT_PERSON_NAME' => $contact_person_name,
            'ADDRESS1' => $address1,
            'ADDRESS2' => $address2,
            'ADDRESS3' => $address3,
            'POSTCODE' => $postcode,
            'PHONE_NO' => $phone_no,
            'STATE_CODE_ID' => $state_code_id
        ]);

        return redirect('vendors/list');
    }


    function list()
    {
        $vendorList = Vendor::all();
        return view('/vendors/list')->with('vendorList', $vendorList);
    }

    function detail($id)
    {
        $vendor = Vendor::where('ID', '=', $id)->first();
        return view('/vendors/detail')
            ->with('vendor', $vendor);
    }

    function edit($id)
    {
        $stateCodes = StateCode::all();
        $vendor = Vendor::where('ID', '=', $id)->first();
        return view('/vendors/edit')
            ->with("vendor", $vendor)
            ->with('stateCodes',$stateCodes);
    }

    function post_edit()
    {

        $id = $_POST['id'];
        $company_name = $_POST['company_name'];
        $contact_person_name = $_POST['contact_person_name'];
        $address1 = $_POST['address1'];
        $address2 = $_POST['address2'];
        $address3 = $_POST['address3'];
        $postcode = $_POST['postcode'];
        $phone_no = $_POST['phone_no'];
        $state_code_id = $_POST['state_code_id'];
        info('company name'.$company_name);

        try {
            DB::connection()->beginTransaction();

            $vendor = Vendor::where("ID", "=", $id)->first();
            $vendor -> update([
                'COMPANY_NAME'=>$company_name,
                'CONTACT_PERSON_NAME'=>$contact_person_name,
                'ADDRESS1'=>$address1,
                'ADDRESS2'=>$address2,
                'ADDRESS3'=>$address3,
                'POSTCODE'=>$postcode,
                'PHONE_NO'=>$phone_no,
               'STATE_CODE_ID'=>$state_code_id
            ]);

            DB::connection()->commit();
        } catch (\Exception $e) {
            info($e);
            DB::connection()->rollBack();
            return redirect("errors/");
        }

        $stateCodes = StateCode::all();
        return redirect('/vendors/detail/' . $vendor->ID)
            ->with('xxx',$stateCodes);
    }
}