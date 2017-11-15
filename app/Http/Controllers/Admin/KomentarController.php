<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\Komentar;

class KomentarController extends Controller
{
    public function index(Komentar $komentar, $status = null) {

        $tipe = request()->get('tipe') ? request()->get('tipe') : 'all';

        $komentars = $komentar->where(function($query) use ($status, $tipe) {
                        if($status) {
                            $query->where('status', $status);
                        }
                        if($tipe != 'all') {
                            $query->where('tipe', $tipe);
                        }
                    })->get();

    	$appr = $komentar->where('status', 'appr')->count();
    	$wappr = $komentar->where('status', 'wappr')->count();

    	return view('admin.komentar.index', compact('komentars', 'appr', 'wappr', 'tipe'));
    }

    public function reply(Request $request, $parent_id) {
    	$this->validate($request, [
    		'komentar' => 'required'
    	]);

    	if(Komentar::find($parent_id)->status == 'wappr');
    		return back()->with('errorMessage', 'Komentar belum di setujui, tidak bisa dibalas.');

    	$request->request->add([
    		'tanggal_komentar' => CarbonDate('Y-m-d'),
    		'nama' => 'Admin',
    		'email' => 'admin@gmail.com',
    		'tipe' => 'pengaduan',
    		'status' => 'appr',
    		'id_induk' => $parent_id,
    		'is_admin' => true,
    		'dibuat_oleh' => 'admin'
    	]);

    	Komentar::create($request->all());
    	return back()->with('successMessage', 'Berhasil membalas komentar.');
    }

    public function destroy(Komentar $komentar) {
    	$komentar->delete();
    	return back()->with('successMessage', 'Komentar berhasil dihapus.');
    }

    public function approve(Komentar $komentar) {
    	$komentar->status = 'appr';
        $komentar->save();
    	return back()->with('successMessage', 'Komentar berhasil disetujui.');
    }

    public function cancelApprove(Komentar $komentar) {
    	$komentar->status = 'wappr';
        $komentar->save();
    	return back()->with('successMessage', 'Komentar berhasil dibatalkan.');
    }
}
