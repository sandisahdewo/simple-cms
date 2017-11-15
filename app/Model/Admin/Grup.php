<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class Grup extends Model
{
    protected $table = 'grup';

    protected $fillable = ['grup', 'keterangan'];

    public $timestamps = true;

    public function user() {
    	return $this->hasMany('App\Model\Admin\User', 'id_user');
    }
}
