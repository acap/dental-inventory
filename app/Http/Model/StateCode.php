<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 19/2/2019
 * Time: 4:31 PM
 */

namespace App\Http\Model;


use Illuminate\Database\Eloquent\Model;

class StateCode extends Model
{
    protected $table = 'DI_STATE_CODE';
    protected $fillable = ["ID","CODE","NAME"];

}
