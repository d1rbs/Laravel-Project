<?php


namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\services\GenderService;
use App\services\SwapiService;
use App\services\PeopleService;
use Illuminate\Http\Request;

class PeopleController extends Controller
{
    /**
     * @var Request
     */
    private $request;
    /**
     * @var PeopleService
     */
    private $peopleService;
    /**
     * @var GenderService
     */
    private $genderService;
    /**
     * @$swapiService
     */
    private $swapiService;

    /**
     * PeopleController constructor.
     * @param Request $request
     * @param PeopleService $peopleService
     */
    public function __construct(Request $request, PeopleService $peopleService, GenderService $genderService, SwapiService $swapiService)
    {
        $this->request = $request;
        $this->peopleService = $peopleService;
        $this->genderService = $genderService;
        $this->swapiService = $swapiService;
    }

    /**
     *
     */
    public function index()
    {
      //
    }


    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Illuminate\Validation\ValidationException
     */
    public function create()
    {
        $genders = $this->genderService->getAll();
        $results = $this->swapiService->getHomeWorld();
        $films = $this->swapiService->getFilms();

        if($this->request->isMethod('post'))
        {
            $this->validate($this->request, [
                'name' => 'required|alpha',
                'height' => 'required|integer',
            ]);

            $this->peopleService->create();
        }

        return view('admin.people.create', [
            'genders' => $genders,
            'results' => $results,
            'films' => $films,
        ]);
    }

    public function edit()
    {
        //
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function update()
    {
        //
        return view('admin.people.update');
    }


     public function delete($id)
     {
//
         return redirect()->back();
     }
}