<?php 

namespace App\Traits;

use App\Model\Admin\Slug;

trait SlugTrait {

	public function showTypeSlug() {
		return $this->typeSlug;
	}

	public function checkSlugIfExists() {
		return Slug::where('slug', request()->slug)->first();
	}
	
	public function storeSlug($id = null) {
		if($this->checkSlugIfExists()) {
			request()->slug = request()->slug."-1";
		}
		Slug::create([
			'type' => $this->typeSlug,
			'slug' => request()->slug,
			'id_relasi' => $id
		]);	
	}

	public function editSlug($id = null) {
		return Slug::where('type', $this->typeSlug)
			->where('id_relasi', $id)
			->first();
	}

	public function updateSlug($id = null) {
		$this->destroySlug($id);
		$this->storeSlug($id);
	}

	public function destroySlug($id) {
		Slug::where('id_relasi', $id)
			->where('type', $this->typeSlug)
			->delete();
	}

}