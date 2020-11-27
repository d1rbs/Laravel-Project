<?php


namespace App\services;


use App\repositories\PlanetsRepository;

class PlanetsService
{
    /**
     * @var PlanetsRepository
     */
    private $planetsRepository;

    /**
     * PlanetsService constructor.
     * @param PlanetsRepository $planetsRepository
     */
    public function __construct(PlanetsRepository $planetsRepository)
    {
        $this->planetsRepository = $planetsRepository;
    }

    /***
     * @param $planets
     * @return \Illuminate\Http\RedirectResponse
     */
    public function create($planets)
    {
        return $this->planetsRepository->create($planets);
    }

    public function getAll()
    {
        return $this->planetsRepository->getAll();
    }

    public function getUrl($url)
    {
        $this->planetsRepository->getUrl($url);
    }
}