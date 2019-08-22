<?php

namespace App\Modules\Partners\Models;

use Illuminate\Database\Eloquent\Model;

class Partners extends Model {

    protected $table = 'patners';
    protected $fillable = ['title', 'image'];

}
