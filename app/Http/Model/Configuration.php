<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 27/2/2019
 * Time: 7:36 PM
 */

namespace App\Http\Model;


use Illuminate\Database\Eloquent\Model;

class Configuration extends Model
{
    protected $table = 'DI_CONFIGURATION';
    protected $primaryKey = 'ID';
    protected $fillable = ['ID', 'KEY_', 'VALUE_'];

}