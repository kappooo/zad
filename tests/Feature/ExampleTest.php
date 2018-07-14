<?php

namespace Tests\Feature;

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
    public function test_get_session_table()
    {

        $date='2018-07-13';
        $response = $this->post(route('scheduling',[
            'start_date'=>$date,
            'days'=>[
                2,3,5
            ],
            'sessions'=>2
        ]));

        $testDate=Carbon::createFromFormat('Y-m-d',$date)->addDay(2);

        $response->assertSee($testDate->format('D d-M-Y'));
    }
}
