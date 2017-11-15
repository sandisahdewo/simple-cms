<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\User\Post;

class TagController extends Controller
{
    public function index($tag) {
    	$post = new Post();
    	$reports = $post->getByTag($tag);
    	return view('public.tag_kategori', compact('reports'));
    }
}
