<?php

namespace Tests\Unit;

use Carbon\Carbon;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_get_time_table()
    {

        $obj=new \App\Http\Controllers\HomeController();
        $noOfSession=5;
        $noOfAllSessions=30*$noOfSession;
        $stringDate='2018-07-13';
        $startDate=Carbon::createFromFormat('Y-m-d',$stringDate);//this date represent friday
        //we need check that the coming sunday is first of dates table as the start of days is 2


        $dates=$obj->getTimeTable($noOfAllSessions,$startDate,[2,4,5]);
       //create new object from start date cause its static and start date value changed



        $newDate=Carbon::createFromFormat('D d-M-Y',$dates[0]);

        $testDate=Carbon::createFromFormat('Y-m-d',$stringDate)->addDay(2);



        $this->assertCount($noOfAllSessions,$dates);

        $this->assertEquals($newDate,$testDate);
    }
}
