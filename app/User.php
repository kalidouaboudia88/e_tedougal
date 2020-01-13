<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function parent(){
        return $this->belongsTo('App\User', 'parent_id','id');
    }

    public function children()
    {
        return $this->hasMany('App\User','parent_id','id');
    }

    public function seller(){
        return $this->hasOne(Seller::class);
    }

    /**
     * Cette méthode va determiner si le user connecté a un role admin
     */
    public function isAdmin(){
        return strtolower(@$this->roles) === 'admin'? true : false;
    }

    /**
     * Cette méthode va determiner si le user connecté a un role moderator
     */
    public function isModerator(){
        return (strtolower(@$this->roles) === 'moderator' || strtolower(@$this->roles) === 'admin')? true : false;
    }
    /**
     * Cette méthode va determiner si le user connecté a un role commercant
     */
    public function isSeller(){
        return (strtolower(@$this->roles) === 'seller' || strtolower(@$this->roles) === 'admin')? true : false;
    }
}
