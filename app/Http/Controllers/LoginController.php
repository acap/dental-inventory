<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 21/1/2019
 * Time: 4:56 PM
 */

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login(Request $req){

        $username = $req -> input('username');
        $password = $req -> input('password');

        $checkLogin = \DB :: table('user') -> where (['USERNAME'=>$username,'PASSWORD'=>$password])->get();

        if(count($checkLogin) > 0){

            return redirect('dashboard');
            //return redirect('orders/list');
            //echo "login successful";
        }
        else{
            echo "Login Fail ";
        }
    }
}