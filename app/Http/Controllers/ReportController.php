<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    public function index(Request $request){

        if (!empty($request->all()) && $request->validate(['from' => 'date|required', 'to' => 'date|required'])) {
            $report = $request->all();
        }else{
            return view('report.index');
        }

        $from = filter_var($report['from'], FILTER_SANITIZE_NUMBER_INT);
        $to = filter_var($report['to'], FILTER_SANITIZE_NUMBER_INT);

        $findDates = DB::select('select month_week, count(bid_id) as count_id, SUM(prosrochka) as expiration from (
         select *,
                DATE_FORMAT(created_at, \'%v/%c/%y\')        month_week,
                TO_DAYS(closed_at) - TO_DAYS(actual_at) >=5 prosrochka
         from deal where done_at between :from and :to)t GROUP BY month_week', ['from' =>$from,'to' => $to]);

    return view('report.index', [
        'findDates' => $findDates,
    ]);
    }
}
