<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 16/1/2019
 * Time: 6:00 PM
 */

namespace App\Http\Model;


use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    protected $table = 'stock';
    protected $fillable = ['ID','STOCK_CODE_ID','QUANTITY'];
}