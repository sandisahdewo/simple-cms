<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class DaftarMenu extends Model
{
    protected $table = 'daftar_menu';

    protected $primaryKey = 'id';

    protected $fillable = ['menu', 'url', 'parent_id', 'id_menu'];

    public $timestamps = true;

    public function menu() {
    	
    }

}
