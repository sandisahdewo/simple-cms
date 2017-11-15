<?php
namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Model\User\Post;

class KegiatanComposer
{
    protected $kegiatan;
    
    public function __construct(Post $post)
    {
        $this->kegiatan = $post->getPost('kegiatan', 2, null);
    }

    public function compose(View $view)
    {
        $view->with('kegiatan', $this->kegiatan);
    }
}