<?php


namespace App\services;

use App\repositories\FilmsRepository;

/**
 * Class FilmsService
 * @package App\services
 */
class FilmsService
{
    /**
     * @var FilmsRepository
     */
    private $filmsRepository;
    /**
     * @var $swapiService
     */
    private $swapiService;

    /**
     * FilmsService constructor.
     * @param FilmsRepository $filmsRepository
     */
    public function __construct(FilmsRepository $filmsRepository, SwapiService $swapiService)
    {
        $this->swapiService = $swapiService;
        $this->filmsRepository = $filmsRepository;
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function create()
    {
        $films_api = $this->swapiService->getFilms();
        return $this->filmsRepository->create($films_api);
    }
}