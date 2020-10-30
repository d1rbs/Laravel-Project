<?php


namespace App\repositories;

use App\Models\Articles;

class ImageChangesRepository
{
    /**
     * @param $id
     * @return mixed
     */
    public function findById($id)
    {
        return  Articles::find($id);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getSlugByID($id)
    {
        $slug = Articles::find($id);
        return $slug;
    }
}