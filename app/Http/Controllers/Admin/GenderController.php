<?php


namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\services\GenderService;

class GenderController extends Controller
{
    /**
     * @var GenderService
     */
    private $genderService;

    /**
     * GenderController constructor.
     * @param GenderService $genderService
     */
    public function __construct(GenderService $genderService)
    {
        $this->genderService = $genderService;
    }

    public function index()
    {


        return view('admin.gender.index');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $this->genderService->create();

        return view('admin.gender.create');
    }

    public function update()
    {


        return view('admin.gender.update');
    }

    public function delete()
    {


        return view('admin.gender.delete');
    }
}