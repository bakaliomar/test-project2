<?php

use Illuminate\Database\Seeder;
use App\DaysOff;
use Carbon\Carbon;

class DaysOffsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DaysOff::truncate();


        DaysOff::create([
            'date' => Carbon::create(2020, 7, 30, 0),
            'span' => '00->23'
        ]);
        DaysOff::create(
        [
            'date' => Carbon::create(2020, 7, 31, 0),
            'span' => '00->23'
        ]);
        DaysOff::create(
        [
            'date' => Carbon::create(2020, 8, 1, 0),
            'span' => '00->23'
        ]);
        DaysOff::create(
        [
            'date' => Carbon::create(2020, 8, 14, 0),
            'span' => '00->12'
        ]);
        DaysOff::create(
        [
            'date' => Carbon::create(2020, 8, 20, 0),
            'span' => '12->23'
        ]
    );
    }
}
