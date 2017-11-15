<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\Post;
use App\Model\Admin\Kategori;
use App\Model\Admin\Tag;

class HalamanController extends Controller
{
    public function index() {
        $status = request()->get('status');
        $post = new Post();
        $optArsip = [];
        
        $data = $post->getData(request()->get('format'), $status, request()->get('arsip'), request()->get('jenis'), request()->get('kategori'), request()->get('tag'));

        foreach($data as $key => $value) {
            $data[$key]->kategori = $post->getKategori($value->id);
            $data[$key]->tag = $post->getTag($value->id);
        }

        $kategori = new Kategori();
        $optKategori = $kategori->get();
        $optTag = Tag::pluck('tag', 'id')->all();

        $countPublish = $post->where('status', '=', 'publish')
                             ->where('format', '=', 'page')
                             ->count();
        $countDraft = $post->where('status', '=', 'draft')
                           ->where('format', '=', 'page')
                           ->count();

        if($post->getArsip()) {
            foreach($post->getArsip() as $arsip) {
                $optArsip[$arsip->arsip] = CarbonHumanDate('%B %Y', $arsip->arsip);        
            }
        }
        return view('admin.post.index_halaman', compact('data', 'optKategori', 'optTag', 'optArsip', 'countPublish', 'countDraft'));
    }
}
