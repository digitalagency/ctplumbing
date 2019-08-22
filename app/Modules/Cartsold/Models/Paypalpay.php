<?php

namespace App\Modules\Carts\Models;

use Illuminate\Database\Eloquent\Model;

class Paypalpay extends Model
{

    protected   $table = 'paypalpays';

    protected $fillable = [
        'customer_id','number_of_post','status'];
    /**
     * The attributes that are date.
     *
     * @var array
     */
     protected $dates = ['created_at', 'updated_at' ];


}
