<?php

namespace App\Http\Controllers;

use App\Http\Requests\ScheduleRequest;
use Carbon\Carbon;


class HomeController extends Controller
{
    //



    private $dates;

    /**
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

}
