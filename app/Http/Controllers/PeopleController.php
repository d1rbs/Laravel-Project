<?php


namespace App\Http\Controllers;


use App\services\PeopleAPIService;
use App\services\SwapiService;

/**
 * Class PeopleController
 * @package App\Http\Controllers
 */
class PeopleController extends Controller
{
    /**
     * @var $peopleAPIService
     */
    private $peopleAPIService;
    /**
     * @$swapiService
     */
    private $swapiService;

    /**
     * PeopleController constructor.
     * @param PeopleAPIService $peopleAPIService
     * @param SwapiService $swapiService
     */
    public function __construct(PeopleAPIService $peopleAPIService, SwapiService $swapiService)
    {
        $this->peopleAPIService = $peopleAPIService;
        $this->swapiService = $swapiService;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
      $peoples = $this->peopleAPIService->getUsers();

        return view('people.index',[
            'peoples' => $peoples,
        ]);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function view($id)
    {
        $people = $this->peopleAPIService->getFindID($id);

        return view('people.view', [
            'people' => $people,
        ]);
    }

    public function create()
    {
        //
        return view('people.create');
    }

    public function update()
    {
        //
        return view('people.update');
    }

    public function delete()
    {
        //
        return view('people.delete');
    }
}