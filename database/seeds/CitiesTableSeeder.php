<?php

use Illuminate\Database\Seeder;
use App\City;

class CitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //City::truncate();


        City::create([
            'name' => 'Tangier',
            'partner_id' => 1
        ]);
        City::create(
        [
            'name' => 'Casa',
            'partner_id' => 2
        ]);
        City::create(
        [
            'name' => 'Rabat',
            'partner_id' => 3
        ]
        );
    }
}
