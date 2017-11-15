<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{

    protected $table = 'kategori';

    protected $fillable = ['kategori', 'parent_id', 'keterangan'];
 
    public $timestamps = true;

}
