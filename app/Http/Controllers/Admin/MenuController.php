<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\Menu;
use App\Model\Admin\DaftarMenu;

class MenuController extends Controller
{
    public function index() {
    	$menus = Menu::get();
    	return view('admin.menu.index', compact('menus'));
    }

    public function store(Request $request) {
    	$this->validate($request, [
    		'menu' => 'required|max:64'
    	]);

    	Menu::create($request->all());
    	return back()->with('successMessage', 'Menu berhasil ditambahkan.');
    }

    public function edit(Menu $menu) {
        $menus = Menu::get();
        if(!$menu->menu == 'Sidebar')
            return view('admin.menu.edit', compact('menus', 'menu'));
        else 
            return back();
    }

    public function update(Request $request, Menu $menu) {
    	$this->validate($request, [
    		'menu' => 'required|max:64'
    	]);

        if(!$request->menu == 'Sidebar') $menu->update($request->all());
    	return back()->with('successMessage', 'Menu berhasil diperbarui.');
    }

    public function destroy(Menu $menu) {
    	$daftarMenu = DaftarMenu::where('id_menu', $menu->id)->get();
        if(!$daftarMenu) {
            if(!$menu->menu == 'Sidebar') $menu->delete();
            return redirect()->route('menu')->with('successMessage', 'Menu berhasil dihapus.');
        }
        return redirect()->back()->with('errorMessage', 'Menu tidak bisa dihapus. Karena masih ada relasi.');
    }
}
