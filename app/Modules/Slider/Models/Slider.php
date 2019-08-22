<?php

namespace App\Modules\Slider\Models;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model {

     protected $table = "sliders";
     protected $dates = ['deleted_at'];
     protected $fillable = ['title', 'link', 'image','status','position'];

}
