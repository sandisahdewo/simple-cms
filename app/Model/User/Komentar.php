<?php

namespace App\Model\User;

use Illuminate\Database\Eloquent\Model;
use DB;

class Komentar extends Model
{
    protected $primaryKey = 'id';

    protected $table = 'komentar';

    protected $fillable = ['tanggal_komentar', 'komentar', 'nama', 'email', 'tipe', 'status', 'id_induk', 'is_admin', 'dibuat_oleh'];

    public $timestamps = true;

    public function getKomentar($tipe = 'pengaduan', $limit = null, $filter = null) {
    	return DB::table('komentar')
    			 ->select('komentar.*')
    			 ->where('tipe', '=', $tipe)
    			 ->where('status', 'appr')
                 ->where(function($query) use ($filter){
                    if($filter) {
                        $query->where('komentar', 'like', '%'.$filter.'%');
                    }
                 })
    			 ->orderBy('tanggal_komentar', 'desc')
    			 ->get();
    }
    
}
