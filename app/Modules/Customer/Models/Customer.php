<?php

namespace App\Modules\Customer\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model {

    protected $softDelete = true;
    
    protected $fillable = ['isfirsttime','email_token',
        'verified','email','is_active','password','name','image','dob',
        'gender','registaion_street_address',
        'currect_address','identification_nbr','remember_token',
        'dob_year','dob_month','dob_day'];

    protected $table =  'customers';

}
