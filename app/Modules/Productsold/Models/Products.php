<?php

namespace App\Modules\Products\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use willvincent\Rateable\Rateable;

class Products extends Model
{
    use SoftDeletes;
    use Rateable;
    protected $table = 'products';

    protected $guarded = ['id','created_at', 'updated_at', 'deleted_at',];

    public function categories()
    {
        return $this->belongsTo('\App\Modules\Category\Models\Category');
    }

    public static function getImageById($id){
        $p = Self::find($id);
       
        if($p){
            return $p->image;
        }
        return;
    }
}
