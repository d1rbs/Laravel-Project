<?php


namespace App\repositories;


use App\Models\Planets;
use Illuminate\Http\Request;

class PlanetsRepository
{
    /**
     * @var Request
     */
    private $request;

    /**
     * PlanetsRepository constructor.
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * @param $planets
     * @return \Illuminate\Http\RedirectResponse
     */
    public function create($planets)
    {
        foreach ($planets as $planet)
        {
            $query = new Planets();

            $query->name = $planet['name'];
            $query->url = $planet['url'];
                             $timestamp = strtotime($planet['created']);
            $query->created_at = date('Y-m-d H:i:s', $timestamp);
                            $timestamp = strtotime($planet['edited']);
            $query->updated_at = date('Y-m-d H:i:s', $timestamp);
            $query->save();
        }
        return redirect()->back();
    }

    /**
     * @return Planets[]|\Illuminate\Database\Eloquent\Collection
     */
    public function getAll()
    {
        return Planets::all();
    }

    /**
     * @param $url
     * @return mixed
     */
    public function getUrl($url)
    {
        foreach ($url as $value)

        return Planets::where('url', '=', $value)->first();
    }
}