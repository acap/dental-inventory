<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 23/3/2019
 * Time: 10:58 PM
 */

namespace App\Http\Model;


use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    protected $table = 'DI_VENDOR';
    protected $primaryKey = 'ID';
    protected $fillable = ['ID', 'STATE_CODE_ID', 'COMPANY_NAME', 'CONTACT_PERSON_NAME', 'ADDRESS1', 'ADDRESS2', 'ADDRESS3', 'POSTCODE', 'PHONE_NO'];

    public function stateCode()
    {
        return $this->belongsTo('App\Http\Model\StateCode', 'STATE_CODE_ID', 'ID');
    }


}