<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $table = 'tag';

    protected $fillable = ['tag', 'keterangan']; 

    public $timestamps = true;
}
