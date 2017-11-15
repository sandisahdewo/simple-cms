<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Admin\DaftarMenu;
use Illuminate\Http\Request;
use App\Model\Admin\Menu;
use App\Model\Admin\Post;

class DaftarMenuController extends Controller
{
    protected $menu;

    public function __construct(Menu $menu, $name = 'Sidebar') {
        $this->menu = $menu->where('menu', $name)->first();
    }

    public function index() {
        $post = new Post;
        $page = $post->getData('page', null, null, 1, null, null);
        
        $parent_id = request()->get('parent_id');
        $daftarMenus = DaftarMenu::where(function($query) use ($parent_id) {
            if($parent_id) $query->where('parent_id', $parent_id);
        })->where('id_menu', $this->menu->id)->get();

        $induk = $parent_id ? DaftarMenu::where('id', $parent_id)->first() : false;
        
    	return view('admin.daftarMenu.index', compact('daftarMenus', 'induk', 'parent_id', 'page'));
    }

    public function store(Request $request) {
    	$this->validate($request, [
    		'menu' => 'required|max:64',
            'url' => 'required|max:255'
    	]);

        $request->request->add(['id_menu' => $this->menu->id]);

    	DaftarMenu::create($request->all());
    	return back()->with('successMessage', 'Daftar Menu berhasil ditambahkan.');
    }

    public function edit(DaftarMenu $daftarMenu) {
    	$parent_id = request()->get('parent_id');

        $daftarMenus = DaftarMenu::where(function($query) use ($parent_id) {
            if($parent_id) $query->where('parent_id', $parent_id);
        })->where('id_menu', $this->menu->id)->get();

        $induk = $parent_id ? DaftarMenu::where('id', $parent_id)->first() : false;

    	return view('admin.daftarMenu.edit', compact('daftarMenus', 'daftarMenu', 'parent_id', 'induk'));
    }

    public function update(Request $request, DaftarMenu $daftarMenu) {
    	$this->validate($request, [
    		'menu' => 'required|max:64',
            'url' => 'required|max:255'
    	]);

        $request->request->add(['id_menu' => $this->menu->id]);
    	$daftarMenu->update($request->all());
    	return back()->with('successMessage', 'Daftar Menu berhasil diperbarui.');
    }

    public function destroy(DaftarMenu $daftarMenu) {
        $parent = DaftarMenu::where('parent_id', $daftarMenu->id)->first();
        if(!$parent) {
        	$daftarMenu->delete();
        	return redirect()->route('daftarMenu', $this->menu->id)->with('successMessage', 'Daftar Menu berhasil dihapus.');
        }
        return redirect()->route('daftarMenu', $this->menu->id)->with('errorMessage', 'Daftar Menu gagal dihapus. Masih memiliki anak.');
            
    }
}
