<?php


namespace App\repositories;


use App\Models\Films;
use Illuminate\Http\Request;

class FilmsRepository
{
    /**
     * @var Request
     */
    private $request;

    /**
     * FilmsRepository constructor.
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function create($films_api)
    {
        foreach ($films_api as $api)
        {
            $films = new Films();
            $films->film_id = $api['episode_id'];
            $films->name = $api['title'];
            $films->url = $api['url'];
            $films->save();
        }

        return redirect()->back();
    }

}