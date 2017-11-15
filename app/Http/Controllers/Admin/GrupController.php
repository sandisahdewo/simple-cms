<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\Grup;
use App\Model\Admin\User;

class GrupController extends Controller
{
    
    public function index() {
        $grups = Grup::all();
        return view('admin.grup.index', compact('grups')); 
    } 

    public function create() {
        return view('admin.grup.create'); 
    }

    public function store(Request $request) {
        $this->validate($request, [
            'grup' => 'required|max:255'
        ]);

        Grup::create($request->all());
        return back()->with('successMessage', 'Grup baru berhasil disimpan.');
    }

    /*
     * This function to show data before edit
     */ 

    public function edit(Grup $grup) {
        return view('admin.grup.edit', compact('grup')); 
    }

    public function update(Request $request, Grup $grup) {
        $this->validate($request, [
            'grup' => 'required|max:255'
        ]);
        
        $grup->update($request->all());
        return back()->with('successMessage', 'Grup berhasil diperbarui.');
    }

    public function destroy(Grup $grup) {
        if(User::whereIdGrup($grup->id)->first());
            return back()->with('errorMessage', 'Grup ada relasi, tidak bisa dihapus!');

        $grup->delete(); 
        return back()->with('successMessage', 'Grup berhasil dihapus.');
    }
}
