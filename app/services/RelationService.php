<?php


namespace App\services;


use App\repositories\RelationRepository;

class RelationService
{
    /* @var RelationRepository */
    private $relationRepository;

    /**
     * RelationService constructor.
     * @param RelationRepository $relationRepository
     */
    public function __construct(RelationRepository $relationRepository)
    {
        $this->relationRepository = $relationRepository;
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getRelationByID($id)
    {
        return $this->relationRepository->getById($id);
    }
}