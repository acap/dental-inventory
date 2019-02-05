<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 3/2/2019
 * Time: 9:21 PM
 */

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{

    protected $table = 'client';
    protected $fillable = ['ID','NAME','IC_NO','ADDRESS','PHONE_NO'];


}