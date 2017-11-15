<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\User\Post;

class PageController extends Controller
{
    public function index($slug) {
    	$post = new Post();
    	$posting = $post->findPost(null, null, $slug, 'page');
    	if(!$posting) return view('public.pnf');
    	return view('public.page', compact('posting'));
    }
}
