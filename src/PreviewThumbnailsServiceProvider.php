<?php

namespace BlackBits\PreviewThumbnails;

use Illuminate\Support\ServiceProvider;


class PreviewThumbnailsServiceProvider extends ServiceProvider
{
    protected $defer = true;

    public function register()
    {
        $this->app->singleton('PreviewThumbnails', PreviewThumbnails::class);
    }

    public function provides()
    {
        return ['PreviewThumbnails'];
    }
}