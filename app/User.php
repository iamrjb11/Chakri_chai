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
        'rolename', 'email', 'password','fullname',
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

    public function roles(){ //here roles is table name
        return $this->belongsToMany('App\Role');
    }
    public function hasAnyRoles($roles){
        return null !== $this->roles()->whereIn('name',$roles)->first(); //here whereIn('name') is roles tbl column name.
    }
    
    public function hasAnyRole($role){
        return null !== $this->roles()->where('name',$role)->first(); //here whereIn('name') is roles tbl column name.
    }
}
