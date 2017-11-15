<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\User\Komentar;
use App\Model\User\Post;

class ComplainController extends Controller
{
    public function index() {
    	$komentar = new Komentar();
    	$complaint = $this->komentar($komentar->getKomentar('pengaduan', false, request()->get('cari')));
    	return view('public.complaint', compact('complaint'));
    }

    public function komentar($elements, $induk = 0) {
        $branch = [];
        foreach($elements as $element) {
            if($element->id_induk == $induk) {
                $jawaban = $this->komentar($elements, $element->id);
                if($jawaban) {
                    $element->jawaban = $jawaban;
                }
                $branch[] = $element;
            }
        }
        return $branch;
    }


}
