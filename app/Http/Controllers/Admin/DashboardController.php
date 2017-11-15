<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Admin\Post;
use App\Model\Admin\Komentar;

class DashboardController extends Controller
{
    public function index() {
		$post = new Post();
		$posts = $post->getSlug();
		$komentars = Komentar::get();
		return view('dashboard', compact('posts', 'komentars'));
    }
}
