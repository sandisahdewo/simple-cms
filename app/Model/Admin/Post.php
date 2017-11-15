<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;
use App\Traits\SlugTrait;
use DB;

class Post extends Model
{
    use SlugTrait;
    
    public $typeSlug = 'post';

    protected $table = 'post';

    protected $primaryKey = 'id';

    protected $fillable = [
        'judul', 'tanggal_posting', 
        'isi', 'jenis', 'format', 
        'status', 'gambar', 'dibuat_oleh', 
        'diubah_oleh'
    ];

    public $timestamps = true;

    protected $attributes = [
        'dibuat_oleh' => 'Admin',
        'diubah_oleh' => 'Admin'
    ];

    public function setTanggalPostingAttribute($date) {
        $this->attributes['tanggal_posting'] = CarbonDate('Y-m-d', $date);
    }

    public function getTanggalPostingAttribute($date) {
        return CarbonDate('d-m-Y', $date);
    }

    public function storePost($request) {
        DB::transaction(function() use ($request){
            $post = self::create($request->all());
            $this->storeSlug($post->id);
    
            if($request->has('id_kategori.*')) {
                foreach($request->id_kategori as $kategori) {
                    DB::table('post_kategori')
                      ->insert([
                            'id_kategori' => $kategori,
                            'id_post' => $post->id
                        ]);
                }
            }
    
            if($request->has('id_tag.*')) {
                foreach($request->id_tag as $tag) {
                    DB::table('post_tag')
                      ->insert([
                            'id_tag' => $tag,
                            'id_post' => $post->id
                        ]);
                }
            }
    
            if($request->has('images.*')) {
                foreach($request->images as $image) {
                    DB::table('post_gambar')
                      ->insert([
                            'id_post' => $post->id,
                            'url_gambar' => $image['url_gambar'],
                            'keterangan' => $image['keterangan'],
                            'link' => $image['link'],
                            'deskripsi' => $image['deskripsi']
                        ]);
                }
            }
        });
    }

    public function findSlugByIdPost($idPost) {
        return $this->editSlug($idPost);
    }

    public function getData($format = null, $status = null, $arsip = null, $jenis = null, $kategori = null, $tag = null) {
    	return DB::table('post')
    			 ->select(
    			 		'post.id', 'post.judul', 'post.isi', 'post.dibuat_oleh', 'post.status', 'post.tanggal_posting', 'slug.slug'
    			 	)
    			 ->join('slug', function($join) {
    			 		$join->on('post.id', '=', 'slug.id_relasi')
    			 			 ->where('slug.type', '=', 'post');
    			 		})
    			 ->leftJoin('post_kategori', 'post.id', '=', 'post_kategori.id_post')
    			 ->leftJoin('kategori', 'kategori.id', '=', 'post_kategori.id_kategori')
    			 ->leftJoin('post_tag', 'post.id', '=', 'post_tag.id_post')
    			 ->leftJoin('tag', 'tag.id', '=', 'post_tag.id_tag')
    			 ->groupBy(
    			 		'post.id', 'post.judul', 'post.isi', 'post.dibuat_oleh', 'post.status', 'post.tanggal_posting', 'slug.slug'
    			  )
                 ->where(function($query) use ($format, $status, $arsip, $jenis, $kategori, $tag) {
                        if($format) {
                            $query->where('format', '=', $format);
                        }
                        if($status) {
                            $query->where('status', '=', $status);
                        }
                        if($arsip) {
                            $query->where(DB::raw('left(tanggal_posting, 7)'), '=', $arsip);
                        }
                        if($jenis) {
                            $query->where('jenis', '=', $jenis);
                        }
                        if($kategori) {
                            $query->where('kategori.id', '=', $kategori);
                        }
                        if($tag) {
                            $query->where('tag.id', '=', $tag);
                        }
                 })
    			 ->get();
    }

    public function getArsip() {
        return DB::table('post')
                 ->select(DB::raw('left(tanggal_posting, 7) as arsip'))
                 ->groupBy(DB::raw('left(tanggal_posting, 7)'))
                 ->orderBy(DB::raw('left(tanggal_posting, 7)', 'desc'))
                 ->get();

    }

    public function getKategori($id) {
    	return DB::table('kategori')
    			 ->select('kategori.*')
    			 ->join('post_kategori', 'kategori.id', '=', 'post_kategori.id_kategori')
    			 ->where('post_kategori.id_post', $id)
    			 ->get();
    }

    public function getTag($id) {
    	return DB::table('tag')
    			 ->select('tag.*')
    			 ->join('post_tag', 'tag.id', '=', 'post_tag.id_tag')
    			 ->where('post_tag.id_post', $id)
    			 ->get();
    }
    public function getSlug() {
      return DB::table('slug')
            ->join('post', 'slug.id', '=', 'post.id')
            ->get();
    }

    public function getPostKategoriByIdPost($idPost) {
        return DB::table('post_kategori')
                 ->select('id_post', 'id_kategori')
                 ->where('id_post', $idPost)
                 ->get();
    }

    public function getPostTagByIdPost($idPost) {
        return DB::table('post_tag')
                 ->select('id_tag')
                 ->where('id_post', $idPost)
                 ->get();
    }

    public function getPostGambarByIdPost($idPost) {
        return DB::table('post_gambar')
                 ->select('post_gambar.*')
                 ->where('id_post', $idPost)
                 ->get();
    }

    public function updatePost($request, $idPost) {
        DB::transaction(function() use ($request, $idPost){
            $post = self::find($idPost)->update($request->all());
    
            $this->updateSlug($idPost);
    
            $this->removePost($idPost);
    
            if($request->has('id_kategori.*')) {
                foreach($request->id_kategori as $kategori) {
                    DB::table('post_kategori')
                      ->insert([
                            'id_kategori' => $kategori,
                            'id_post' => $idPost
                        ]);
                }
            }
    
            if($request->has('id_tag.*')) {
                foreach($request->id_tag as $tag) {
                    DB::table('post_tag')
                      ->insert([
                            'id_tag' => $tag,
                            'id_post' => $idPost
                        ]);
                }
            }
    
            if($request->has('images.*')) {
                foreach($request->images as $key => $image) {
                    DB::table('post_gambar')
                      ->insert([
                            'id_post' => $idPost,
                            'url_gambar' => $image['url_gambar'],
                            'keterangan' => $image['keterangan'],
                            'link' => $image['link'],
                            'deskripsi' => $image['deskripsi']
                        ]);
                }
            }
        });
    }

    public function deletePost($idPost) {
        DB::transaction(function() use ($idPost) {
            $post = self::destroy($idPost);
    
            $this->destroySlug($idPost);
    
            $this->removePost($idPost);
        });
    }

    public function removePost($idPost) {
        DB::transaction(function() use ($idPost) {
            DB::table('post_kategori')
              ->where('id_post', $idPost)
              ->delete();
    
            DB::table('post_tag')
              ->where('id_post', $idPost)
              ->delete();
    
            DB::table('post_gambar')
              ->where('id_post', $idPost)
              ->delete();
        });
    }

}
