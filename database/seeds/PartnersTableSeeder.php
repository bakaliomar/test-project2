<?php

use Illuminate\Database\Seeder;
use App\Partner;

class PartnersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Partner::truncate();


        Partner::create([
            'name' => 'Nada'
        ]);
        Partner::create(
        [
            'name' => 'Hassan'
        ]);
        Partner::create(
        [
            'name' => 'Mohamed'
        ]
        );
    }
}
