<?php


namespace App\services;

use App\services\SwapiService;
use App\repositories\PeopleRepository;

/**
 * Class PeopleService
 * @package App\services
 */
class PeopleService
{
    /**
     * @var PeopleRepository
     */
    private $peopleRepository;
    /**
     * @var GenderService
     */
    private $genderService;

    private $swapiService;
    /**
     * PeopleService constructor.
     * @param PeopleRepository $peopleRepository
     */
    public function __construct(PeopleRepository $peopleRepository, GenderService $genderService, SwapiService $swapiService)
    {
        $this->peopleRepository = $peopleRepository;
        $this->genderService = $genderService;
        $this->swapiService = $swapiService;
    }

    /**
     * @return mixed
     */
    public function getAllUsers()
    {
        $paginate = $this->swapiService->getPeople();

        return  $this->peopleRepository->getAll($paginate);
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function create()
    {
       return $this->peopleRepository->create();
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($id)
    {
     //  return $this->peopleRepository->delete($id);
    }

}