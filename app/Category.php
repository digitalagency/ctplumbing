<?php

namespace App;
use App\Post;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
  protected $table = 'categories';
  protected $dates = ['deleted_at'];
  protected $fillable = ['title', 'parent', 'slug', 'content','user_id'];

//   public function posts()
//     {
//         return $this->belongsToMany(Post::class,'post_id','id');
//     }

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

    // public static function getIdBySlugAll($slug){
    //   $category = Self::select('id')->where('slug', $slug)->first();
    //   if($category){
    //     return $category->id;
    //   }
    //   return null;
    // }

}
