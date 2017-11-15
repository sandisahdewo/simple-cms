<?php

namespace App\Http\Controllers\Admin;

use App\Model\Admin\Kategori;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Traits\SlugTrait;

class KategoriController extends Controller
{
    use SlugTrait;

    public $typeSlug = 'kategori';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $parent_id = request()->get('parent_id');
        if($parent_id) {
            $kategoris = Kategori::where('parent_id', $parent_id)->get();
            $backButtonControll = Kategori::where('id', $parent_id)->first();
        } else {
            $kategoris = Kategori::where('parent_id', null)->get();
        }

        return view('admin.kategori.index', compact('kategoris', 'subKategori', 'backButtonControll', 'parent_id')); 
    }

   /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'kategori' => 'required|max:255',
            'slug' => 'required|max:255'
        ]);

        $kategori = Kategori::create($request->all());
        $this->storeSlug($kategori->id);
        return back()->with('successMessage', 'Kategori baru berhasil disimpan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Admin\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function show(Kategori $kategori)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Admin\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $parent_id = request()->get('parent_id');
        if($parent_id) {
            $kategoris = Kategori::where('parent_id', $parent_id)->get();
            $backButtonControll = Kategori::where('id', $parent_id)->first();
        } else {
            $kategoris = Kategori::where('parent_id', null)->get();
        }

        $kategori = Kategori::find($id);

        $slug = $this->editSlug($id);

        return view('admin.kategori.edit', compact('kategori', 'kategoris', 'slug', 'backButtonControll', 'parent_id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Admin\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kategori $kategori, $id)
    {
        $this->validate($request, [
            'kategori' => 'required|max:255',
            'slug' => 'required|max:255'
        ]);   

        Kategori::find($id)->update($request->all());

        $this->updateSlug($id);
        return back()->with('successMessage', 'Kategori berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Admin\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kategori $kategori, $id)
    {
        $parent = Kategori::where('parent_id', $id)->get();
        if(!$parent) {
            Kategori::destroy($id);
            $this->destroySlug($id);
            return back()->with('successMessage', 'Kategori berhasil dihapus.');
        }
        return back()->with('errorMessage', 'Kategori masih memiliki children, tidak bisa dihapus.');
    }
}
