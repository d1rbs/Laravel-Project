<?php


namespace App\services;


use App\repositories\PeopleFilmsRelationRepository;

/**
 * Class PeopleFilmsRelationService
 * @package App\services
 */
class PeopleFilmsRelationService
{
    /**
     * @var PeopleFilmsRelationRepository
     */
    private $peopleFilmsRelationRepository;

    /**
     * PeopleFilmsRelationService constructor.
     * @param PeopleFilmsRelationRepository $peopleFilmsRelationRepository
     */
    public function __construct(PeopleFilmsRelationRepository $peopleFilmsRelationRepository)
    {
        $this->peopleFilmsRelationRepository = $peopleFilmsRelationRepository;
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getFilms($id)
    {
        return $this->peopleFilmsRelationRepository->getFilms($id);
    }
}