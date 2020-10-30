<?php


namespace App\repositories;


use App\Models\Relation;

class RelationRepository
{
    /**
     * @param $id
     * @return mixed
     */
    public function getById($id)
    {
        return Relation::where('article_id', '=', $id)->first();
    }
}