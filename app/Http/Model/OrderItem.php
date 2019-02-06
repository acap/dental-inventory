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

class DentalOrder extends Model {
    protected $table = 'dental_order';
    protected $fillable = ['ID', 'ORDER_NO', 'NAME','TOTAL_AMOUNT','DESCRIPTION','DATE_DELIVERY','STATUS'];

    public function getStatusAttribute($value) {
        if($value == 1)
            return "NEW";
        if($value == 2)
            return "PROCESSING";
        if($value == 3)
            return "COMPLETED";
        else
            return "CANCELLED";
    }
}