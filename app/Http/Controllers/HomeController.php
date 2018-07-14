<?php

namespace App\Http\Controllers;

use App\Http\Requests\ScheduleRequest;
use Carbon\Carbon;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //



    private $dates;

    /**
     * @todo create feature test for project
     * @param ScheduleRequest $request
     * @return array
     */

    public function scheduling(ScheduleRequest $request)
    {

        if(!count($request->days))
        {
            return back()->withErrors(['you must select date']);
        }
        $numebrOfChapters = 30;
        $allSessionToFinishAllChapters = $numebrOfChapters * $request->sessions;
        $startDate = $this->createDate($request->start_date);
        $dates=$this->getTimeTable($allSessionToFinishAllChapters,$startDate,$request->days);


        return view('table',compact('dates'));
    }


    public function table()
    {


    }

    /**
     * @param $date | string
     * @return static |\Carbon\Carbon
     */

    public function createDate( $date)
    {
        return Carbon::createFromFormat('Y-m-d',$date);
    }


    /**
     *  map days of week to from 1- 7 days
     * starts with saturday
     *
     * @param $date
     * @return int
     */

    public function mapDayWeek($date)
    {

        return ($date)==6?1:$date+2;
    }


    /**
     * @param $allSessionToFinishAllChapters
     * @param $startDate
     * @param $days
     * @return array \   times available to take sessions
     */

    public function getTimeTable($allSessionToFinishAllChapters,$startDate,$days)
    {
        $i = 0;
        $dates = [];
        while ($i<$allSessionToFinishAllChapters){

            if (in_array($this->mapDayWeek($startDate->dayOfWeek) ,$days)) {
                $dates[] = $startDate->format('D d-M-Y');
                $i++;
            }
            $startDate = $startDate->addDay(1);
        }
        return $dates;
    }


    /**
     * @param $items
     * @param int $perPage
     * @param null $page
     * @param array $options
     * @return LengthAwarePaginator
     */
    public function paginate($items, $perPage = 10, $page = null, $options = [])
    {
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);
        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
    }
}
