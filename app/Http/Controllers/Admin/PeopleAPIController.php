<?php


namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\services\PeopleAPIService;
use App\services\SwapiService;
use Illuminate\Http\Request;

/**
 * Class PeopleAPIController
 * @package App\Http\Controllers\Admin
 */
class PeopleAPIController extends Controller
{
    /**
     * @var
     */
    private $request;
    /**
     * @var PeopleAPIService
     */
    private $peopleAPIService;
    /**
     * @var
     */
    private $swapiService;

    /**
     * PeopleAPIController constructor.
     * @param PeopleAPIService $peopleAPIService
     * @param SwapiService $swapiService
     */
    public function __construct(Request $request, PeopleAPIService $peopleAPIService, SwapiService $swapiService)
    {
        $this->request = $request;
        $this->peopleAPIService = $peopleAPIService;
        $this->swapiService = $swapiService;
    }

    public function create()
    {
        $apis = $this->swapiService->getPeople();

        $this->peopleAPIService->create($apis);

        return view('admin.api.create');
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function delete($id)
    {
        $this->peopleAPIService->delete($id);

        return redirect('people/index');
    }
}