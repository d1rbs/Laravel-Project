<?php


namespace App\repositories;

use App\Models\PeopleAPI;
use App\Models\Planets;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class ReportingRepository extends Model
{
    /**
     * @var Request
     */
    private $request;

    /**
     * ReportingRepository constructor.
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * @return PeopleAPI[]|\Illuminate\Database\Eloquent\Collection
     */
    public function getHomeWorld()
    {
        return Planets::all();
    }

    /**
     * @param $report
     * @return mixed
     */
    public function search($report)
    {
      // $findWorld = PeopleAPI::find()->with('films')->where('homeworld', '=', $report);
       // $findWorld = PeopleAPI::find($report)->films;
        $findWorld = PeopleAPI::where('homeworld', '=', $report)->get();
//dd($findWorld);
       /* $findWorld = Planets::select('planets.id', 'people_api.*')
            ->join('people_api', 'people_api.homeworld', '=', 'planets.id')
            ->where('people_api.homeworld', '=', $report)->get();*/

        return $findWorld;
    }
}