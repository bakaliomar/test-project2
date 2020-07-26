<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\City;
use App\DeliveryTime;
use App\DaysOff;
use Carbon\Carbon;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return City::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return City::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return City::find($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $city = City::find($id);
        $city->update($request->all());
        return $city;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return City::find($id)->delete();
    }

    public function attach(Request $request, $id)
    {
        $dt = $request->ids;
        $msg = [];
        $msg["messages"] = [];
        //$dt = intval($dt);
        $i = 0;
        foreach($dt as $item){
            $dh = DeliveryTime::find($item);
            if (!empty($dh)){
                if(empty($dh->city_id)){
                    $dh->city_id = $id;
                    $dh->save();
                    $msg["messages"][$item]= $dh;
                }else {
                    $msg["messages"][$item]= 'the time is already attached to another city';
                }
            }
            else{
                $msg["messages"][$item]= 'error';
            }
        }
        return $msg;
    }
    public function deliveries($city_id, $number_of_days)
    {
        //$delv= DB::table('delivery_times')->where('city_id', '=', $city_id)->get();
        $delv = DeliveryTime::where(function ($query) use($city_id) {
            $query->where('city_id', '=', $city_id);
        })->get();
        $dysOff = DaysOff::all();
        $item = [];
        $item["dates"] = [];
        for ($i = 0;$i < $number_of_days; $i++ ){
            $dt = Carbon::today()->addDays($i);
            $span =[];
            foreach ($delv as $de){
                $key = true;
                foreach($dysOff as $day){
                    $nums = explode('->', $de->delivery_at);
                    $dsp = explode('->', $day->span);
                    if((($nums[0] >= $dsp[0] && $nums[0] <= $dsp[1] ) || ($nums[1] >= $dsp[0] && $nums[1] <= $dsp[1])) && $dt->diffInDays($day->date) == 0){
                        $key = false;
                    }
                    
                }
                if($key){
                    array_push($span, $de);
                }
                
            }
            if(count($span) > 0){
                $item["dates"][$i] = [
                    "day_name"  => $dt->format('l'),
                    "date" => $dt->toDateString(),
                    "delivery_times" => $span
                ];
            }
        }
        return $item;
    }
    
}
