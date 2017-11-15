<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
{
    
    public function boot()
    {
        View::composer(
            [
                'public.gallery',
                'public.allWithPagging',
                'public.complaint',
                'public.tag_kategori',
                'public.post',
                'public.page',
            ],
            'App\Http\ViewComposers\BeritaComposer'
        );

        View::composer(
            [
                'public.gallery',
                'public.allWithPagging',
                'public.complaint',
                'public.tag_kategori',
                'public.post',
                'public.page',
            ], 
            'App\Http\ViewComposers\KegiatanComposer'
        );
    }

    public function register()
    {
        //
    }
}