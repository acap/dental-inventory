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

class Order extends Model
{
    protected $table = 'DI_ORDER';
    protected $primaryKey = 'ID';
    protected $fillable = ['ID', 'CLIENT_ID', 'ORDER_NO', 'TOTAL_AMOUNT', 'DESCRIPTION', 'DATE_DELIVERY', 'STATUS'];

    public function client()
    {
        return $this->belongsTo('App\Http\Model\Client', 'CLIENT_ID', 'ID');
    }

    public function items()
    {
        return $this->hasMany('App\Http\Model\OrderItem');
    }

    public function getStatusAttribute($value)
    {
        if ($value == 1)
            return "NEW";
        if ($value == 2)
            return "PROCESSING";
        if ($value == 3)
            return "COMPLETED";
        else
            return "CANCELLED";
    }
}
