<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\User\Post;

class ArsipController extends Controller
{
	public function index($tahun = null, $bulan = null) {
		$post = new Post();
		$date = $tahun.'-'.$bulan;
		$reports = $post->getPost(request()->segment(1), 3, $date);
		$berita = $post->getPost('berita', 2, null);
		$kegiatan = $post->getPost('kegiatan', 2, null);

		foreach($post->getYearArsip() as $arsip) {
			$optArsip[$arsip->arsip] = CarbonDate('Y', $arsip->arsip);
		}
		return view('public.arsip', compact('reports', 'optArsip', 'berita', 'kegiatan'));
    }

    public function detail($slug) {
    	$post = new Post();
    	$jenis = request()->segment(1);
    	$posting = $post->findPost($jenis, null, $slug);
    	if($posting->format == 'image') {
    		$posting->images = $post->getImageByIdPost($posting->id);
    	}

        if($posting->format != 'page') {
            $posting->tag = $post->getTagByIdPost($posting->id);
            $posting->kategori = $post->getKategoriByIdPost($posting->id);
        }

    	$berita = $post->getPost('berita', 2, null);
    	$kegiatan = $post->getPost('kegiatan', 2, null);

    	return view('public.post', compact('posting', 'berita', 'kegiatan'));
    }
}
