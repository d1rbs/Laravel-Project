<?php


namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\services\FilmsService;
use Illuminate\Http\Request;

/**
 * Class FilmsController
 * @package App\Http\Controllers\Admin
 */
class FilmsController extends Controller
{
    /**
     * @var
     */
    private $request;
    /**
     * @var FilmsService
     */
    private $filmsService;

    /**
     * FilmsController constructor.
     * @param FilmsService $filmsService
     */
    public function __construct(Request $request, FilmsService $filmsService)
    {
        $this->request = $request;
        $this->filmsService = $filmsService;
    }

    public function index()
    {

        return view('admin.films.index');
    }

    public function create()
    {
        $this->filmsService->create();

        return view('admin.films.create');
    }

    public function store()
    {

        return view('admin.films.store');
    }

    public function view()
    {

        return view('admin.films.view');
    }

    public function update()
    {

        return view('admin.films.update');
    }

    public function delete()
    {

        return view('admin.films.delete');
    }
}