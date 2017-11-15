<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\User\Post;

class GaleriController extends Controller
{
    public function index() {
    	$post = new Post();

    	$galeri = $post->getGalery();

    	return view('public.gallery', compact('galeri'));
    }

    public function detail($slug) {
    	$post = new Post();

    	$galeri = $post->getGalery();
    	$album = $post->getAlbum($slug);
        if($album->isEmpty()) {
            return view('public.pnf');
        }
    	return view('public.gallery', compact('galeri', 'album'));
    }
}
