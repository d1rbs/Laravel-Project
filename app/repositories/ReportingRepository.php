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
    public function search($report = null)
    {
        $findWorld = PeopleAPI::where('homeworld', '=', $report)->get();

        return $findWorld;
    }
}