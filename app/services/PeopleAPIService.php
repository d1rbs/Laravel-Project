<?php


namespace App\services;

use App\Models\PeopleFilmsRelation;
use App\repositories\PeopleAPIRepository;
use App\repositories\PeopleRepository;

/**
 * Class PeopleAPIService
 * @package App\services
 */
class PeopleAPIService
{
    /**
     * @var PeopleRepository
     */
    private $APIRepository;
    /**
     * @var SwapiService
     */
    private $swapiService;
    /**
     * @var PlanetsService
     */
    private $planetsService;
    /**
     * @var PeopleFilmsRelationService
     */
    private $peopleFilmsRelationService;
    /**
     * PeopleAPIService constructor.
     * @param PeopleRepository $peopleRepository
     */
    public function __construct(PeopleAPIRepository $APIRepository, SwapiService $swapiService, PlanetsService $planetsService, PeopleFilmsRelationService $peopleFilmsRelationService)
    {
        $this->APIRepository = $APIRepository;
        $this->swapiService = $swapiService;
        $this->planetsService = $planetsService;
        $this->peopleFilmsRelationService = $peopleFilmsRelationService;
    }

    /**
     * getFindID
     */
    public function getFindID($id)
    {
        return $this->APIRepository->getFindID($id);
    }

    public function getUsers()
    {
       return $this->APIRepository->getUserPaginate();
    }
    /**
     * @param $apis
     * @return \Illuminate\Http\RedirectResponse
     */
    public function create($apis)
    {
        $films = $this->swapiService->getFilms();

        return $this->APIRepository->create($apis, $films, $this->planetsService->getAll());
    }

    public function delete($id)
    {
        $relation = $this->peopleFilmsRelationService->getFilms($id);
        return $this->APIRepository->delete($id, $relation);
    }
}