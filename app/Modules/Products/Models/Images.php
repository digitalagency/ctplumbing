<?php

namespace App\Modules\Products\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use willvincent\Rateable\Rateable;

class Images extends Model
{
 
    protected $table = 'images';

    public function products()
    {
        return $this->belongsTo('\App\Modules\Products\Models\Products', 'product_id');
    }

   
}
