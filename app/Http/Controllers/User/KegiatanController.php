<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\User\Post;

class KegiatanController extends Controller
{
    public function detail($slug) {
    	$post = new Post();

    	$posting = $post->findPost('kegiatan', null, $slug);

    	return view('public.post', compact('posting'));
    }
}
