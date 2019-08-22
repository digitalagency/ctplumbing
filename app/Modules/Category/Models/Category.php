<?php

namespace App\Modules\Category\Models;

use App\Post;
use Illuminate\Database\Eloquent\Model;
use App\Modules\Products\Models\Products;

class Category extends Model {

        protected $table = 'categories';
        protected $dates = ['deleted_at'];
        protected $fillable = ['title', 'parent', 'slug', 'content','user_id','image'];
      
   
          public function posts()
          {
              return $this->belongsToMany(Post::class);
          }
    
          public static function getIdBySlug($slug){
            $category = Self::select('id')->where('slug', $slug)->first();
            if($category){
              return $category->id;
            }
            return null;
          }

          public static function countProduct($link){
            $slug = explode('/', $link); 
           
            $id = Self::getIdBySlug($slug[1]);
            $count = Products::where('category_id', $id)->count();
            return $count;

          }

}
