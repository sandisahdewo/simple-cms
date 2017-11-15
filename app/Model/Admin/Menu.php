<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $table = 'menu';

    protected $primaryKey = 'id';

    protected $fillable = ['menu', 'keterangan'];

    public $timestamps = true;
}
