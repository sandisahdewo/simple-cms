<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\Post;
use App\Model\Admin\Kategori;
use App\Model\Admin\Tag;

class PostController extends Controller {
    
    public function index() {
        $status = request()->get('status');
    	$post = new Post();
        
        $data = $post->getData(request()->get('format'), $status, request()->get('arsip'), request()->get('jenis'), request()->get('kategori'), request()->get('tag'));

    	foreach($data as $key => $value) {
    		$data[$key]->kategori = $post->getKategori($value->id);
    		$data[$key]->tag = $post->getTag($value->id);
    	}

        $kategori = new Kategori();
        $optKategori = $kategori->get();
        $optTag = Tag::pluck('tag', 'id')->all();

        $countPublish = $post->where('status', '=', 'publish')
                              ->where('format', '!=', 'page')
                              ->count();
        $countDraft = $post->where('status', '=', 'draft')
                           ->where('format', '!=', 'page')
                           ->count();

        foreach($post->getArsip() as $arsip) {
            $optArsip[$arsip->arsip] = CarbonHumanDate('%B %Y', $arsip->arsip);        
        }
        if(empty($optArsip)) $optArsip[0] = '';
        
        return view('admin.post.index_post', compact('data', 'optKategori', 'optTag', 'optArsip', 'countPublish', 'countDraft'));
    }

    public function create() {
        $format = request()->get('format');
        switch ($format) {
            case 'standart':
                return $this->createPost();
                break;
            case 'page':
                return $this->createPage();
                break;
            case 'image':
                return $this->createImage();
                break;
            default:
                return $this->createPost();
                break;
        }
    }

    public function createPost() {
        $kategori = Kategori::all();
        $treeKategori = tree($kategori);
        $tag = Tag::all()->pluck('tag', 'id');
        return view('admin.post.standart.create', compact('treeKategori', 'tag'));
    }

    public function store(Request $request) {
        $this->validate($request, [
            'judul' => 'required|max:255',
            'slug' => 'required|max:255',
            'jenis' => 'required'
        ]);

        $post = new Post();
        $post->storePost($request);
        return back()->with('successMessage', 'Post berhasil disimpan.');
    }

    public function createPage() {
        return view('admin.post.page.create');
    }

    public function createImage() {
        $kategori = Kategori::get();
        $treeKategori = tree($kategori);
        $tag = Tag::all()->pluck('tag', 'id');
        return view('admin.post.image.create', compact('kategori', 'treeKategori', 'tag'));
    }

    public function edit($id) {
        $post = Post::find($id);

        $format = request()->get('format');
        if(!$format) {
            $format = $post->format;
        }

        switch ($format) {
            case 'standart':
                return $this->editPost($post);
                break;
            case 'page':
                return $this->editPage($post);
                break;
            case 'image':
                return $this->editImage($post);
                break;
            default:
                return $this->editPost($post);
                break;
        }
    }

    public function editPost($post) {
        $modelPost = new Post();

        $kategori = Kategori::get();
        $treeKategori = tree($kategori);
        $tag = Tag::all()->pluck('tag', 'id');

        $dataSlug = $modelPost->findSlugByIdPost($post->id);
        $dataKategori = array(); 
                
        foreach($post->getPostKategoriByIdPost($post->id)->pluck('id_kategori')->all() as $id_kategori) {            
            $dataKategori[$id_kategori] = $id_kategori;
        }
        $post->id_kategori = $dataKategori;
        $dataTag = $post->getPostTagByIdPost($post->id)->pluck('id_tag')->all();
        $post->id_tag = $dataTag;
        return view('admin.post.standart.edit', 
            compact('post', 'tag', 'treeKategori', 'dataSlug')
        );
    }

    public function editPage($post) {
        $modelPost = new Post();
        $dataSlug = $modelPost->findSlugByIdPost($post->id);
        return view('admin.post.page.edit', compact('post', 'dataSlug'));
    }

    public function editImage($post) {
        $modelPost = new Post();

        $kategori = Kategori::get();
        $treeKategori = tree($kategori);
        $tag = Tag::all()->pluck('tag', 'id');

        $dataSlug = $modelPost->findSlugByIdPost($post->id);
        $dataKategori = $post->getPostKategoriByIdPost($post->id)->pluck('id_kategori')->all();
        $dataTag = $post->getPostTagByIdPost($post->id)->pluck('id_tag')->all();
        $images = $post->getPostGambarByIdPost($post->id);
        $dataKategori = array(); 
                
        foreach($post->getPostKategoriByIdPost($post->id)->pluck('id_kategori')->all() as $id_kategori) {            
            $dataKategori[$id_kategori] = $id_kategori;
        }
        $post->id_kategori = $dataKategori;
        $dataTag = $post->getPostTagByIdPost($post->id)->pluck('id_tag')->all();
        $post->id_tag = $dataTag;
        return view('admin.post.image.edit', 
            compact('post', 'tag', 'treeKategori', 'dataSlug', 'images')
        );
    }

    public function update(Request $request, $id) {
        $post = new Post();

        $post->updatePost($request, $id);
        return back()->with('successMessage', 'Postingan berhasil diperbarui.');
    }

    public function delete($id) {
        $post = new Post();

        $post->deletePost($id);
        return back()->with('successMessage', 'Postingan berhasil dihapus.');
    }

    public function draft($id) {
        $post = Post::find($id)->update(['status' => 'draft']);
        return back()->with('successMessage', 'Postingan berhasil rubah ke draft.');
    }

    public function publish($id) {
        $post = Post::find($id)->update(['status' => 'publish']);
        return back()->with('successMessage', 'Postingan berhasil dipublish.');
    }


}
