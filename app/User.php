<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function getGravatarAttribute()
        {
            $hash = md5(strtolower(trim($this->attributes['email'])));
            return "http://www.gravatar.com/avatar/$hash";
        }

    /*return posts*/

    public function posts(){

      return $this->hasMany(Posts::class);
    }

    /*return pages*/
    public function pages(){

        return $this->hasMany(Pages::class);
    }

    /*return topics*/
    public function topics(){

      return $this->hasMany(Topics::class);

    }
    public function teams(){
        return $this->belongsTo(Team::class);
     }
}
