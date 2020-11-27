<?php


namespace App\repositories;

use App\Models\People;
use App\Models\PeopleAPI;
use App\Models\PeopleFilmsRelation;
use App\Models\Planets;
use Illuminate\Http\Request;

/**
 * Class PeopleAPIRepository
 * @package App\repositories
 */
class PeopleAPIRepository
{
    /**
     * @var Request
     */
    private $request;

    /**
     * PeopleAPIRepository constructor.
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }
        public function getFindID($id)
        {
        return PeopleAPI::find($id);
        }
    /**
     * @return mixed
     */
    public function getUserPaginate()
    {
        return PeopleAPI::orderByDesc('updated_at')->paginate(10);
    }

    public function getUserAPI()
    {
        return $query[] = PeopleAPI::all();
    }

    /**
     * @param $apis
     * @param $films
     * @param $planets
     * @param $tables
     * @return \Illuminate\Http\RedirectResponse
     */
    public function create($apis, $films, $tables)
    {
        foreach($apis as $api) {

            $people = new PeopleAPI();

            $people->name = $api['name'];
            $people->height = $api['height'];
            $people->gender = $api['gender'];

            foreach ($tables as $table) {
                if ($api['homeworld'] == $table->url) {
                    $people->homeworld = $table->id;
                }
            }
            $timestamp = strtotime($api['created']);
            $people->created_at = date('Y-m-d H:i:s', $timestamp);
            $timestamp = strtotime($api['edited']);
            $people->updated_at = date('Y-m-d H:i:s', $timestamp);

            $people->save();
        foreach ($api['films'] as $key => $film_url){
            foreach ($films as $film_array) {
       if($film_url == $film_array['url']){

                $relation = new PeopleFilmsRelation();
                $relation->people_id = $people->id;
                $relation->film_id = $film_array['episode_id'];
              $relation->save();
            }
            }
        }
        }
        return redirect()->back();
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($id, $relation)
    {

           $pfr = PeopleFilmsRelation::where('people_id', '=', $id)->get();
        foreach ($pfr as $item){
           //dd($item);die;
            $item->delete($item->id);
       }

        $people = PeopleAPI::find($id);
        $people->delete($id);

        return redirect()->back();
    }
}