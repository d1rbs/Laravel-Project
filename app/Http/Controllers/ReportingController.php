<?php

namespace App\Http\Controllers;

use App\Models\PeopleAPI;
use App\Models\PeopleFilmsRelation;
use App\services\PeopleFilmsRelationService;
use App\services\ReportingService;
use Illuminate\Http\Request;


class ReportingController extends Controller
{
    /**
     * @var Request
     */
    private $request;
    /**
     * @var ReportingService
     */
    private $reportingService;
    /**
     * @var PeopleFilmsRelation
     */
    private $peopleFilmsRelationService;
    /**
     * ReportingController constructor.
     */
    public function __construct(Request $request, ReportingService $reportingService, PeopleFilmsRelationService $peopleFilmsRelationService )
    {
        $this->request = $request;
        $this->reportingService = $reportingService;
        $this->peopleFilmsRelationService = $peopleFilmsRelationService;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Illuminate\Validation\ValidationException
     */
    public function index()
    {
        $homeWorld = $this->reportingService->getHomeWorld();

       if($this->request->all()){
            $this->validate($this->request, [
                'homeWorld' => 'required',
            ],[
               'homeWorld.required' => 'Потрібно обовязково ввести дані в це поле',
            ]);
           $report = $this->request->all();
           $findWorld = $this->reportingService->search($report['homeWorld']);
           /*foreach ($findWorld as $value){
               $relation = $this->peopleFilmsRelationService->getFilms($value->id);
           }*/
        }
//dd($findWorld);
       $test = PeopleAPI::all();
        return view('reporting.index', [
            'homeWorld' => $homeWorld,
            'findWorld' => $findWorld,
           // 'relation' => $relation,
            'test' =>$test,
        ]);
    }

    public function create()
    {

    }

    public function update()
    {

    }

    public function delete()
    {

    }
}
