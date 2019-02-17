<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 11/1/2019
 * Time: 1:10 AM
 */

namespace App\Http\Model;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Stock extends Model
{
    protected $table = 'DI_STOCK';
    protected $fillable = ['STOCK_CODE_ID', 'QUANTITY'];

    public function stockCode()
    {
        return $this->belongsTo('App\Http\Model\StockCode', 'STOCK_CODE_ID', 'ID');
    }

}
