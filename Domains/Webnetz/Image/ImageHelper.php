<?php
declare(strict_types=1);

namespace Domains\Webnetz\Image;

use Domains\Webnetz\Image\ImageService;

class ImageHelper
{
    public static function getUserImages()
    {
        $service = new ImageService();
        return $service->getUserImages();
    }
}
