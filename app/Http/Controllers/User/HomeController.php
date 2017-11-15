<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\User\Post;
use App\Model\User\Komentar;

class HomeController extends Controller
{
    public function index() {
    	$post = new Post();
        $komentar = new Komentar();

    	$sliders = $post->getSliders();

        $kegiatan = $post->getPost('kegiatan', 2, null);
        $sliderBerita = $post->getPost('berita', 2, null);
        
        $galeri = $post->getGalery(4);
    	$komentar = $this->komentar($komentar->getKomentar('pengaduan', 3));

    	return view('public.index', compact('sliders', 'kegiatan', 'sliderBerita', 'galeri', 'komentar'));
    }

    public function komentar($elements, $induk = 0) {
        $branch = [];
        foreach($elements as $element) {
            if($element->id_induk == $induk) {
                $jawaban = $this->komentar($elements, $element->id);
                if($jawaban) {
                    $element->jawaban = $jawaban;
                }
                $branch[] = $element;
            }
        }
        return $branch;
    }

    public function storeTanggapan(Request $request) {
        $this->validate($request, [ 
            'email' => 'required|email|max:255',
            'komentar' => 'required'
        ]);

    	$request->request->add([
    		'tanggal_komentar' => CarbonDate('Y-m-d'),
    		'nama' => $request->email,
    		'tipe' => 'pengaduan',
    		'status' => 'wappr',
    		'id_induk' => 0,
    		'is_admin' => false,
    		'dibuat_oleh' => $request->email
    	]);

    	Komentar::create($request->all());
    	return back()->with('successMessage', 'Tanggapan berhasil dikirim. Dan sedang menunggu persetujuan.');
    }


}
