<?php


namespace App\repositories;


use App\Models\People;
use App\Models\PeopleAPI;
use App\Models\PeopleFilmsRelation;
use Illuminate\Http\Request;

/**
 * Class PeopleRepository
 * @package App\repositories
 */
class PeopleRepository
{
    /**
     * @var Request
     */
    private $request;

    /**
     * PeopleRepository constructor.
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
        $people = new People();
        $people->name = $this->request->input('name');
        $people->save();

        $api = new PeopleAPI();
        $api->user_id = $people->id;
        $api->name = $people->name;
        $api->height = $this->request->input('height');
        $api->gender = $this->request->input('gender');
        $api->homeworld = $this->request->input('homeWorld');
        $api->save();

        foreach ($this->request->input('item') as $film){
            $relation = new PeopleFilmsRelation();
            $relation->people_id = $api->id;
            $relation->film_id = $film;
            $relation->save();
        }

        return redirect()->back();
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($id)
    {

        return redirect()->back();
    }

    /**
     * @param $id
     * @return mixed update
     */
    public function findID($id)
    {
        return People::find($id);
    }
}