<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class Slug extends Model
{
    protected $table = 'slug';

    protected $fillable = ['type', 'slug', 'id_relasi'];

    public $timestamps = false;
}
