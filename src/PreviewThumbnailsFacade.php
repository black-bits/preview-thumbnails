<?php

namespace BlackBits\PreviewThumbnails;

use Illuminate\Support\Facades\Facade;


class PreviewThumbnailsFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'PreviewThumbnails';
    }
}