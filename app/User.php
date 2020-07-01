<?php

namespace App;

use Illuminate\Notifications\Notifiable;
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
        'name', 'email', 'password', 'role_id', 'is_active','is_head','head', 'photo_id', 'username'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function role()
    {
        return $this->belongsTo('App\Role');
    }
    
    public function photo()
    {
        return $this->belongsTo('App\Photo');
    }
    
    /*
    public function setPasswordAttribute($password)
    {
        if(!empty($password)){
            $this->attributes['password'] = bcrypt($password);
        }
    }
    */
    
    public function isAdmin()
    {
        if($this->role->name == "admin" && $this->is_active == 1){
            return true;
        }
        return false;
    }
    
    public function isBowner()
    {
        if($this->role->name == "business" && $this->is_active == 1){
            return true;
        }
        return false;
    }

    public function isManager()
    {
        if ($this->role->name == "manager" && $this->is_active == 1) {
            return true;
        }
        return false;
    }

    public function isEmployee()
    {
        if($this->role->name == "bfm" && $this->is_active == 1){
            return true;
        }
        return false;
    }

    public function isHRD()
    {
        if($this->role->name == "HRD" && $this->is_active == 1){
            return true;
        }
        return false;
    }

      public function isOutlet()
    {
        if($this->role->name == "outlet" && $this->is_active == 1){
            return true;
        }
        return false;
    }

     public function isDM()
    {
        if($this->role->name == "DM" && $this->is_active == 1){
            return true;
        }
        return false;
    }
    
     public function isFM()
    {
        if($this->role->name == "FM" && $this->is_active == 1){
            return true;
        }
        return false;
    }
    
     public function isEDP()
    {
        if($this->role->name == "EDP" && $this->is_active == 1){
            return true;
        }
        return false;
    }
  
    
}
