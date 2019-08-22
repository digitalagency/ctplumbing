<?php

namespace App\Modules\Review\Models;

use Illuminate\Database\Eloquent\Model;
use willvincent\Rateable\Rateable;


class Review extends Model {

    use Rateable;
    protected $table = 'reviews';
    protected $fillable = ['name', 'review','rating','customer_id','product_id','created_at','updated_at'];
}
