<?php


namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\services\PlanetsService;
use App\services\SwapiService;
use Illuminate\Http\Request;

class PlanetsController extends Controller
{
    /**
     * @var  $request
     */
    private $request;
    /**
     * @var PlanetsService
     */
    private $planetsService;
    /**
     * @var
     */
    private $swapiService;

    /**
     * PlanetsController constructor.
     * @param Request $request
     * @param PlanetsService $planetsService
     * @param SwapiService $swapiService
     */
    public function __construct(Request $request, PlanetsService $planetsService, SwapiService $swapiService)
    {
        $this->request = $request;
        $this->swapiService = $swapiService;
        $this->planetsService = $planetsService;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
            $planets = $this->swapiService->getHomeWorld();

           $homeWorld = $this->planetsService->create($planets);

        return view('admin.planet.create', [
            'homeWorld' => $homeWorld,
        ]);
    }
}