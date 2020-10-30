<?php


namespace App\Http\Controllers;


use Illuminate\Http\Request;

/**
 * Class ProfileController
 * @package App\Http\Controllers
 */
class ProfileController extends Controller
{
    /**
     * FieldController constructor.
     */
    public function __construct(Request $request)
    {
        $this->middleware('auth');
        $this->reqs = $request;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(){


        return view('profiles.index');
    }
}