<?php


namespace App\repositories;


use App\Models\PeopleFilmsRelation;

/**
 * Class PeopleFilmsRelationRepository
 * @package App\repositories
 */
class PeopleFilmsRelationRepository
{

    public function __construct()
    {
//
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getFilms($id)
    {
        return PeopleFilmsRelation::where('people_id', '=', $id)->get();
    }
}