<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 16/1/2019
 * Time: 6:00 PM
 */

namespace App\Http\Model;


use Illuminate\Database\Eloquent\Model;

class StockCode extends Model
{
    protected $table = 'stock_code';
    protected $fillable = ['ID','CODE','DESCRIPTION','PRICE'];
}