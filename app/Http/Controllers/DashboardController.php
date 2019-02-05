<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 3/2/2019
 * Time: 2:23 AM
 */

namespace App\Http\Controllers;


use App\Http\Model\DentalOrder;

class DashboardController extends Controller
{

    function dashboard()
    {
        $dashboard = array();
        $dashboard[0] = array("title" => "New Order", "count" => DentalOrder::where("status", "=", "1")->count());
        $dashboard[1] = array("title" => "Processing Order", "count" => DentalOrder::where("status", "=", "2")->count());
        $dashboard[2] = array("title" => "Completed Order", "count" => DentalOrder::where("status", "=", "3")->count());
        $dashboard[3] = array("title" => "Cancelled Order", "count" => DentalOrder::where("status", "=", "4")->count());

        info(print_r($dashboard, 1));

        return view("dashboard")
            ->with("dashboard", $dashboard);
    }
}