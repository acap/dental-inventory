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

class OrderItem extends Model {
    protected $table = 'DI_ORDER_ITEM';
    protected $primaryKey = 'ID';
    protected $fillable = ['ID', 'ORDER_ID', 'STOCK_CODE_ID','QUANTITY', 'AMOUNT'];

    public function stockCode()
    {
        return $this->belongsTo('App\Http\Model\StockCode', 'STOCK_CODE_ID', 'ID');
    }

}
