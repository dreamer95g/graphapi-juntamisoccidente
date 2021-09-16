<?php

namespace App\GraphQL\Mutations;

use App\Models\Media\Image;

class UploadImage
{
    /**
     * @param  null  $_
     * @param  array<string, mixed>  $args
     */
    public function __invoke($_, array $args)
    {
        $file = $args['file'];
        $img = $file->storePublicly('');
        $data = ['name' => $img];
        $image = Image::create($data);
        return $image;
    }
}
