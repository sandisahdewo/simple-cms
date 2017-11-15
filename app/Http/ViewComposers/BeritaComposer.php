<?php
namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Model\User\Post;

class BeritaComposer
{
    protected $berita;
    
    public function __construct(Post $post)
    {
        $this->berita = $post->getPost('berita', 2, null);
    }

    public function compose(View $view)
    {
        $view->with('berita', $this->berita);
    }
}