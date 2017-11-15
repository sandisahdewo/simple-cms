<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class Komentar extends Model
{
    protected $id = 'id';
    
    protected $table = 'komentar';

    protected $fillable = ['tanggal_komentar', 'komentar', 'nama', 'email', 'tipe', 'status', 'id_induk', 'is_admin', 'dibuat_oleh'];

    public $timestamps = true;

}
