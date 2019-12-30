<?php

namespace App\Http\Controllers\Admin;

use Spatie\MediaLibrary\Models\Media;
use Spatie\MediaLibrary\PathGenerator\PathGenerator;

class CustomMediaPathGenerator implements PathGenerator
{

    public function getPath(Media $media) : string
    {
        if ($media instanceof City) {
            return 'images/city/' . $media->id;
        }

        if ($media instanceof State) {
            return 'images/state/' . $media->id;
        }
    }

    public function getPathForConversions(Media $media) : string
    {
        return $this->getPath($media) . 'conversions/';
    }

    public function getPathForResponsiveImages(Media $media): string
    {
        return $this->getPath($media) . 'responsive/';
    }

}