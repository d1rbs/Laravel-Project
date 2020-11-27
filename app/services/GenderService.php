<?php


namespace App\services;


use App\repositories\GenderRepository;

class GenderService
{
    /**
     * @var GenderRepository
     */
    private $genderRepository;

    /**
     * GenderService constructor.
     * @param GenderRepository $genderRepository
     */
    public function __construct(GenderRepository $genderRepository)
    {
        $this->genderRepository = $genderRepository;
    }

    /**
     * create
     */
    public function create()
    {
        $this->genderRepository->create();
    }

    public function getAll()
    {
       return $this->genderRepository->getAll();
    }
}