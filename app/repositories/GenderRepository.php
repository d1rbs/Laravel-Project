<?php


namespace App\repositories;


use App\Models\Gender;
use Illuminate\Http\Request;

/**
 * Class GenderRepository
 * @package App\repositories
 */
class GenderRepository
{
    /**
     * @var Request
     */
    private $request;

    /**
     * GenderRepository constructor.
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function create()
    {
        $gender = new Gender();

        $gender->name = $this->request->input('name');

        $gender->save();

        return redirect()->back();
    }

    /**
     * @return Gender[]|\Illuminate\Database\Eloquent\Collection
     */
    public function getAll()
    {
        return $query = Gender::all();
    }
}