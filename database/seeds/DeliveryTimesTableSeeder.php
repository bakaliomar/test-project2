<?php

use Illuminate\Database\Seeder;
use App\DeliveryTime;

class DeliveryTimesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DeliveryTime::truncate();


        DeliveryTime::create(
        [
            'delivery_at' => '9->13',
            'city_id' => 1
        ]);
        DeliveryTime::create(
        [
            'delivery_at' => '14->18',
            'city_id' => 1
        ]);
        DeliveryTime::create(
        [
            'delivery_at' => '18->20',
            'city_id' => 1
        ]);
        DeliveryTime::create(
        [
            'delivery_at' => '10->13',
            'city_id' => 2
        ]);
        DeliveryTime::create(
        [
            'delivery_at' => '15->19',
            'city_id' => 2
        ]);
        DeliveryTime::create(
        [
            'delivery_at' => '9->12',
            'city_id' => 3
        ]);
        DeliveryTime::create(
        [
            'delivery_at' => '14->18',
            'city_id' => 3
        ]
        );
    }
}
