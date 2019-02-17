<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 16/1/2019
 * Time: 6:00 PM
 */

namespace App\Http\Model;


use Illuminate\Database\Eloquent\Model;

class StockEntry extends Model
{
    protected $table = 'DI_STOCK_ENTRY';
    protected $fillable = ['ID','STOCK_CODE_ID','QUANTITY'];
}
