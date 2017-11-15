<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable 
{
    protected $table = 'user';

    protected $fillable = [
    	'username', 
    	'nama', 
    	'email', 
    	'password', 
    	'id_grup', 
    	'terakhir_login'
    ]; 

    public $timestamps = true;

    protected $attributes = [
    	'remember_token' => 0
    ];

    public function setTerakhirLoginAttribute($date) {
    	$this->attributes['terakhir_login'] = CarbonDate('Y-m-d', $date);
    }

    public function setPasswordAttribute($password) {
    	$this->attributes['password'] = bcrypt($password);
    }

    public function grup() {
        return $this->belongsTo('App\Model\Admin\Grup', 'id_grup');
    }
}
