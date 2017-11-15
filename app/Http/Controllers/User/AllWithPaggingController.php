<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\User\Post;

class AllWithPaggingController extends Controller
{
	public function index() {
		$post = new Post();
		$reports = $post->getPostWithPaggination(request()->segment(1), 3, null, null, 10);

		return view('public.allWithPagging', compact('reports'));
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

    	return view('public.post', compact('posting'));
    }
}
