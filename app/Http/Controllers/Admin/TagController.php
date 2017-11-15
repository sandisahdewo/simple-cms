<?php

namespace App\Http\Controllers\Admin;

use App\Model\Admin\Tag;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Traits\SlugTrait;

class TagController extends Controller
{
    use SlugTrait;

    public $typeSlug = 'tag';
    
    public function index()
    {
        $tags = Tag::all();
        return view('admin.tag.index', compact('tags')); 
    }

    public function create()
    {

    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'tag' => 'required|max:255',
            'slug' => 'required|max:255'
        ]);
        
        $tag = Tag::create($request->all());
        $this->storeSlug($tag->id);
        return back()->with('successMessage', 'Tag berhasil disimpan');
    }

    
    public function show(Tag $tag)
    {
        //
    }

    public function edit(Tag $tag)
    {
        $tags = Tag::all();
        $slug = $this->editSlug($tag->id);
        return view('admin.tag.edit', compact('tags', 'tag', 'slug')); 
    }

    public function update(Request $request, Tag $tag)
    {
        $this->validate($request, [
            'tag' => 'required|max:255',
            'slug' => 'required|max:255'
        ]);

        $tag->update($request->all());
        $this->updateSlug($tag->id);
        return back()->with('successMessage', 'Tag berhasil diperbarui.');
    }

    public function destroy(Tag $tag)
    {
        $tag->delete();
        $this->destroySlug($tag->id);
        return back()->with('successMessage', 'Tag berhasil dihapus');
    }
}
