<?php

namespace App\Model\User;

use Illuminate\Database\Eloquent\Model;
use DB;

class Post extends Model
{
	protected $primaryKey = 'id';

    protected $table = 'post';

    public function getSliders() {
    	return DB::table('post')
    			 ->select('post.id', 'post.judul', 'post.tanggal_posting', 'post_gambar.*')
    			 ->join('slug', function($join) {
						$join->on('post.id', '=', 'slug.id_relasi')
							 ->where('slug.type', '=', 'post');
						})
    			 ->join('post_gambar', 'post.id', '=', 'post_gambar.id_post')
    			 ->where('post.format', '=', 'image')
    			 ->where('slug.slug', '=', 'main-image')
    			 ->get();
    }

    public function getGalery($limit = null) {
    	return DB::table('post')
    			 ->join('slug', function($join) {
						$join->on('post.id', '=', 'slug.id_relasi')
							 ->where('slug.type', '=', 'post');
						})
				 ->where('post.jenis', '=', '4') // Galeri memiliki kode jenis 4
    			 ->where('post.status', '=', 'publish')
                 ->orderBy('tanggal_posting', 'desc')
                 ->limit($limit)
				 ->get();
    }

    public function getAlbum($slug = null, $limit = null) {
        return DB::table('post_gambar')
                 ->join('post', 'post.id', '=', 'post_gambar.id_post')
                 ->join('slug', function($join) {
                    $join->on('post.id', '=', 'slug.id_relasi')
                        ->where('slug.type', '=', 'post');
                    })
                 ->where('post.jenis', '=', '4')
                 ->where('slug.slug', '=', $slug)
                 ->limit($limit)
                 ->get();
    }

    public function getImageByIdPost($idPost) {
        return DB::table('post_gambar')
                 ->join('post', 'post.id', '=', 'post_gambar.id_post')
                 ->join('slug', function($join) {
                    $join->on('post.id', '=', 'slug.id_relasi')
                        ->where('slug.type', '=', 'post');
                    })
                 ->where('post_gambar.id_post', '=', $idPost)
                 ->get();
    }

    public function getPost($jenis = null, $limit = null, $tanggal = null, $format = null) {
        if($jenis == 'berita') {
            $jenis = 1;
        } else if($jenis == 'pengumuman') {
            $jenis = 2;
        } else if($jenis == 'page') {
            $jenis = 3;
        } else if($jenis == 'galeri') {
            $jenis = 4;
        } else if($jenis == 'kegiatan') {
            $jenis = 5;
        } else {
            $jenis = null;
        }

        return DB::table('post')
                 ->select('post.*', 'slug.slug')
                 ->join('slug', function($join) {
                    $join->on('post.id', '=', 'slug.id_relasi')
                         ->where('slug.type', '=', 'post');
                    })
                 ->where(function($query) use ($jenis, $tanggal, $format) {
                    if($jenis) {
                        $query->where('post.jenis', '=', $jenis);
                    }
                    if($tanggal) {
                        $query->where(DB::raw('left(post.tanggal_posting, 7)'), '=', $tanggal);
                    }
                    if($format) {
                        $query->where('post.format', '=', $format);
                    }
                 })
                 ->where('post.status', '=', 'publish')
                 ->orderBy('post.tanggal_posting', 'desc')
                 ->limit($limit)
                 ->get();
    }

    public function getPostWithPaggination($jenis = null, $limit = null, $tanggal = null, $format = null, $paginate = 5) {
        if($jenis == 'berita') {
            $jenis = 1;
        } else if($jenis == 'pengumuman') {
            $jenis = 2;
        } else if($jenis == 'page') {
            $jenis = 3;
        } else if($jenis == 'galeri') {
            $jenis = 4;
        } else if($jenis == 'kegiatan') {
            $jenis = 5;
        } else {
            $jenis = null;
        }

        return DB::table('post')
                 ->select('post.*', 'slug.slug')
                 ->join('slug', function($join) {
                    $join->on('post.id', '=', 'slug.id_relasi')
                         ->where('slug.type', '=', 'post');
                    })
                 ->where(function($query) use ($jenis, $tanggal, $format) {
                    if($jenis) {
                        $query->where('post.jenis', '=', $jenis);
                    }
                    if($tanggal) {
                        $query->where(DB::raw('left(post.tanggal_posting, 7)'), '=', $tanggal);
                    }
                    if($format) {
                        $query->where('post.format', '=', $format);
                    }
                 })
                 ->where('post.status', '=', 'publish')
                 ->orderBy('post.tanggal_posting', 'desc')
                 ->paginate($paginate);
    }

    public function findPost($jenis = null, $tanggal = null, $slug = null, $format = null) {
        if($jenis == 'berita') {
            $jenis = 1;
        } else if($jenis == 'pengumuman') {
            $jenis = 2;
        } else if($jenis == 'page') {
            $jenis = 3;
        } else if($jenis == 'galeri') {
            $jenis = 4;
        } else if($jenis == 'kegiatan') {
            $jenis = 5;
        } else {
            $jenis = null;
        }

        return DB::table('post')
                 ->select('post.*', 'slug.slug')
                 ->join('slug', function($join) {
                    $join->on('post.id', '=', 'slug.id_relasi')
                         ->where('slug.type', '=', 'post');
                    })
                 ->where(function($query) use ($jenis, $tanggal, $slug, $format) {
                    if($jenis) {
                        $query->where('post.jenis', '=', $jenis);
                    }
                    if($tanggal) {
                        $query->where('post.tanggal_posting', '=', $tanggal);
                    }
                    if($slug) {
                        $query->where('slug.slug', '=', $slug);
                    }
                    if($format) {
                        $query->where('post.format', '=', $format);
                    }
                 })
                 ->where('post.status', '=', 'publish')
                 ->orderBy('tanggal_posting', 'desc')
                 ->first();
    }

    /*public function getBerita($limit = null) {
        return DB::table('post')
                 ->select('post.*', 'slug.slug')
                 ->join('slug', function($join) {
                    $join->on('post.id', '=', 'slug.id_relasi')
                         ->where('slug.type', '=', 'post');
                    })
                 ->where('post.jenis', '=', '1') // Berita memiliki kode jenis 1
                 ->where('post.status', '=', 'publish')
                 ->orderBy('tanggal_posting', 'desc')
                 ->limit($limit)
                 ->get();
    }

    public function getKegiatan($limit = null) {
        return DB::table('post')
                 ->select('post.*', 'slug.slug')
                 ->join('slug', function($join) {
                    $join->on('post.id', '=', 'slug.id_relasi')
                         ->where('slug.type', '=', 'post');
                    })
                 ->where('post.jenis', '=', '5') // Kegiatan memiliki kode jenis 5
                 ->where('post.status', '=', 'publish')
                 ->orderBy('tanggal_posting', 'desc')
                 ->limit($limit)
                 ->get();
    } */
    public function getKategoriByIdPost($idPost) {
        return DB::table('post_kategori')
                 ->join('kategori', 'post_kategori.id_kategori', '=', 'kategori.id')
                 ->where('post_kategori.id_post', '=', $idPost)
                 ->get();
    }

    public function getTagByIdPost($idPost) {
        return DB::table('post_tag')
                 ->join('tag', 'post_tag.id_tag', '=', 'tag.id')
                 ->where('post_tag.id_post', '=', $idPost)
                 ->get();
    }

    public function getByKategori($kategori) {
         return DB::table('post')
                 ->select('post.*', 'slug.slug')
                 ->join('slug', function($join) {
                    $join->on('post.id', '=', 'slug.id_relasi')
                         ->where('slug.type', '=', 'post');
                    })
                 ->join('post_kategori', 'post.id', '=', 'post_kategori.id_post')
                 ->join('kategori', 'post_kategori.id_kategori', '=', 'kategori.id')
                 ->where('post.status', '=', 'publish')
                 ->where('kategori.kategori', 'like', '%'.$kategori.'%')
                 ->orderBy('tanggal_posting', 'desc')
                 ->get();
    }

    public function getByTag($tag) {
         return DB::table('post')
                 ->select('post.*', 'slug.slug')
                 ->join('slug', function($join) {
                    $join->on('post.id', '=', 'slug.id_relasi')
                         ->where('slug.type', '=', 'post');
                    })
                 ->join('post_tag', 'post.id', '=', 'post_tag.id_post')
                 ->join('tag', 'post_tag.id_tag', '=', 'tag.id')
                 ->where('post.status', '=', 'publish')
                 ->where('tag.tag', 'like', '%'.$tag.'%')
                 ->orderBy('tanggal_posting', 'desc')
                 ->get();
    }

    public function getYearArsip() {
        return DB::table('post')
                 ->select(DB::raw('left(tanggal_posting, 4) as arsip'))
                 ->groupBy(DB::raw('left(tanggal_posting, 4)'))
                 ->orderBy(DB::raw('left(tanggal_posting, 4)', 'desc'))
                 ->get();

    }

    /*public function getArsipByFilter($jenis = null, $limit = null, $date = null) {
        return DB::table('post')
    			 ->select('post.*', 'slug.slug')
    			 ->join('slug', function($join) {
    			 	$join->on('post.id', '=', 'slug.id_relasi')
    			 		 ->where('slug.type', '=', 'post');
    			 	})
    			 ->where('post.jenis', '=', $jenis)
    			 ->where('post.status', '=', 'publish')
                 ->orderBy('tanggal_posting', 'desc')
                 ->limit($limit)
				 ->where('tanggal_posting', 'like', '%'.$date.'%')
    			 ->get();
    }*/

}
