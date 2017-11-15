<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\User\Post;

class KategoriController extends Controller
{
    public function index($kategori) {
    	$post = new Post();

    	$reports = $post->getByKategori($kategori);
    	return view('public.tag_kategori', compact('reports'));
    }
}
