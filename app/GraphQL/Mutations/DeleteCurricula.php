<?php

namespace App\GraphQL\Mutations;

use App\Models\Curriculum\Curriculum as Curriculum;
use Illuminate\Support\Facades\Storage;

class DeleteCurricula
{
    /**
     * @param  null  $_
     * @param  array<string, mixed>  $args
     */
    public function __invoke($_, array $args)
    {
        $ids = $args['ids'];
        $result = array();

        if (count($ids) != 0) {

            foreach ($ids as $id) {
                //OBTENER EL CURRICULUM
                $curriculum = Curriculum::find($id);

                if ($curriculum != null) {
                    //OBTENER LA IMAGEN
                    $img = $curriculum->images()->first();

                    if ($img != null) {

                        //BORRAR LA IMAGEN
                        $img->delete();
                        Storage::delete($img->name);

                        //DETACH IMAGE
                        $curriculum->images()->detach($img->id);

                        //BORRAR EL CURRICULUM
                        $curriculum->delete();
                    } else {
                        //BORRAR EL CURRICULUM
                        $curriculum->delete();
                    }

                    array_push($result, $curriculum);
                }
            }
        }

        return $result;
    }
}
