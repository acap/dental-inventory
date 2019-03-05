<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 27/2/2019
 * Time: 10:17 PM
 */

namespace App\Http\Controllers;

use App\Http\Model\Configuration;
use Illuminate\Support\Facades\DB;

class ConfigurationController extends Controller
{
    function add()
    {
        return view('ownerConfigurations/add');
    }

    function post_add()
    {
        /*
         * $_POST is magic post
         * inside refer to name at blade input
         * variable will hold the value from blade based on name input
         * after that is the eloquent model which bring the value to model
         * how i can keluarkan data kat view
         */
        $businessName = $_POST["businessName"];
        $businessAddress1 = $_POST["businessAddress1"];
        $businessAddress2 = $_POST["businessAddress2"];
        $businessAddress3 = $_POST["businessAddress3"];
        $businessPostcode = $_POST["businessPostcode"];
        $businessPhoneNo = $_POST["businessPhoneNO"];

        Configuration::create([
            "KEY_" => "business.name",
            "VALUE_" => $businessName
        ]);

        Configuration::create([
            "KEY_" => "business.address1",
            "VALUE_" => $businessAddress1
        ]);

        Configuration::create([
            "KEY_" => "business.address2",
            "VALUE_" => $businessAddress2
        ]);

        Configuration::create([
            "KEY_" => "business.address3",
            "VALUE_" => $businessAddress3
        ]);
        Configuration::create([
            "KEY_" => "business.postCode",
            "VALUE_" => $businessPostcode
        ]);
        Configuration::create([
            "KEY_" => "business.phoneNo",
            "VALUE_" => $businessPhoneNo
        ]);

        return redirect('/ownerConfigurations/detail');
    }

    function detail()
    {
        $businessName = Configuration::where("KEY_", '=', "business.name")->first();
        $businessAddress1 = Configuration::where("KEY_", '=', "business.address1")->first();
        $businessAddress2 = Configuration::where("KEY_", '=', "business.address2")->first();
        $businessAddress3 = Configuration::where("KEY_", '=', "business.address3")->first();
        $businessPostcode = Configuration::where("KEY_", '=', "business.postcode")->first();
        $businessPhoneNo = Configuration::where("KEY_", '=', "business.phoneNo")->first();

        return view('/ownerConfigurations/detail')
            ->with('businessName', $businessName)
            ->with('businessAddress1', $businessAddress1)
            ->with('businessAddress2', $businessAddress2)
            ->with('businessAddress3', $businessAddress3)
            ->with('businessPostcode', $businessPostcode)
            ->with('businessPhoneNo', $businessPhoneNo);

    }

    function edit()
    {
        $businessName = Configuration::where("KEY_", '=', "business.name")->first();
        $businessAddress1 = Configuration::where("KEY_", '=', "business.address1")->first();
        $businessAddress2 = Configuration::where("KEY_", '=', "business.address2")->first();
        $businessAddress3 = Configuration::where("KEY_", '=', "business.address3")->first();
        $businessPostcode = Configuration::where("KEY_", '=', "business.postcode")->first();
        $businessPhoneNo = Configuration::where("KEY_", '=', "business.phoneNo")->first();
        return view('/ownerConfigurations/edit')
            ->with('businessName', $businessName)
            ->with('businessAddress1', $businessAddress1)
            ->with('businessAddress2', $businessAddress2)
            ->with('businessAddress3', $businessAddress3)
            ->with('businessPostcode', $businessPostcode)
            ->with('businessPhoneNo', $businessPhoneNo);
    }

    function post_edit()
    {
        //ambk data dari view
        $businessName = $_POST['business_name'];
        $businessAddress1 = $_POST['business_address1'];
        $businessAddress2 = $_POST['business_address2'];
        $businessAddress3 = $_POST['business_address3'];
        $businessPostcode = $_POST['business_postcode'];
        $businessPhoneNo = $_POST['business_phoneNo'];

        info("businessName " . $businessName);
        info("businessName " . $businessAddress1);
        info("businessName " . $businessAddress2);
        info("businessName " . $businessAddress2);

//        try {
//            DB::connection()->beginTransaction();

            //dia cari tmpt kat model
            $businessNameConfig = Configuration::where("KEY_", '=', "business.name")->first();
            $businessAddress1Config = Configuration::where("KEY_", '=', "business.address1")->first();
            $businessAddress2Config = Configuration::where("KEY_", '=', "business.address2")->first();
            $businessAddress3Config = Configuration::where("KEY_", '=', "business.address3")->first();
            $businessPostcodeConfig = Configuration::where("KEY_", '=', "business.postcode")->first();
            $businessPhoneNoConfig = Configuration::where("KEY_", '=', "business.phoneNo")->first();

            //leps dia jumpe tmpt kat model
            //update ni untuk update kn
            info('from ' .$businessNameConfig->VALUE_);
            info('to ' .$businessName);

            // GUNA =>
            $businessNameConfig->update(['VALUE_' => $businessName]);
            $businessAddress1Config->update(['VALUE_' => $businessAddress1]);
            $businessAddress2Config->update(['VALUE_' => $businessAddress2]);
            $businessAddress3Config->update(['VALUE_' => $businessAddress3]);
            $businessPostcodeConfig->update(['VALUE_' => $businessPostcode]);
            $businessPhoneNoConfig->update(['VALUE_' => $businessPhoneNo]);


//            DB::connection()->commit();
//        } catch (\Exception $e) {
//            info($e);
//            DB::connection()->rollBack();
//            return redirect("errors/");
//        }

        return redirect('/ownerConfigurations/detail');
    }


}