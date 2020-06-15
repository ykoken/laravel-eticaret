<?php

namespace App\Concerns;

use Illuminate\Support\Collection;
use stdClass;

trait FileUploadTrait
{

    private function __fileuploads($file, $path_map)
    {
        $image = $file;
        $image_map = time() . '.' . $image->getClientOriginalExtension();
        $destinationPath = $path_map;
        $image_map_path = $image->move($destinationPath, $image_map);

        return $image_map_path;
    }
}
