<?php

namespace App\Http\Resources;


use Carbon\Carbon;

class KiwiSearchResource
{

    public static function toArray($request)
    {
        $response = [];
        foreach ($request as $offer){
            $startTime  = Carbon::parse($offer['local_departure']);
            $endTime    = Carbon::parse($offer['local_arrival']);

            $duration   = $endTime->diff($startTime);

            $hours      = $duration->h; // Number of hours
            $minutes    = $duration->i; // Number of minutes

            $response [] = [
                'id'                    => $offer['id'],
                'origin'                => $offer['flyFrom'],
                'destination'           => $offer['flyTo'],
                'departing_at'          => Carbon::parse($offer['local_departure'])->format('Y-m-d h:i A'),
                'arriving_at'           => Carbon::parse($offer['local_arrival'])->format('Y-m-d  h:i A'),
                'price'                 => $offer['price'],
//                'duration'              => $hours . ' hours '  . $minutes . ' mins',
//                'currency'              => 'EUR',
                'airways'               => $offer['airlines'][0],
                'transit_time'          => self::getTransitTime($offer['flyFrom'] , $offer['flyTo'], $offer['route']),
                'transit_time_return'   => self::getReturnTransitTime($offer['flyFrom'] , $offer['flyTo'], $offer['route']),
                'total_transit_time'    =>   self::getTransitTime($offer['flyFrom'] , $offer['flyTo'], $offer['route']) + self::getReturnTransitTime($offer['flyFrom'] , $offer['flyTo'], $offer['route']),
                'route'                 => self::getRoutes($offer['route']),
                'af_link'               => $offer['deep_link'],
                'provider'              => 'KIWI'
            ];
        }

        return $response;
    }

    public static function getRoutes($routes)
    {
        $routes_arr = [];

        foreach ($routes as $key => $route){

            $startTime  = Carbon::parse($route['local_departure']);
            $endTime    = Carbon::parse($route['local_arrival']);

            $duration = $endTime->diff($startTime);

            $hours = $duration->h; // Number of hours
            $minutes = $duration->i; // Number of minutes

            $routes_arr []  =  [
                'origin'                => $route['flyFrom'],
                'destination'           => $route['flyTo'],
                'departing_at'          => Carbon::parse($route['local_departure'])->format('Y-m-d h:i A') ,
                'arriving_at'           => Carbon::parse($route['local_arrival'])->format('Y-m-d  h:i A'),
//                'duration'              => $hours . ' hours '  . $minutes . ' mins',
            ];

        }
        return $routes_arr;
    }

    public static function getTransitTime($origin, $destination , $routes)
    {
        $transit_time  = 0;
        $routes_arr    = [];

        foreach ($routes as $key => $route) {

            $routes_arr[] = [
                'origin'            => $route['flyFrom'],
                'destination'       => $route['flyTo'],
                'departing_at'      => Carbon::parse($route['local_departure']),
                'arriving_at'       => Carbon::parse($route['local_arrival']),
            ];


            // only add going route to the array to calculate transit time
            if($route['flyTo'] == $destination){
                break;
            }

        }

        // Calculate transit time
        for ($i = 0; $i < count($routes_arr) - 1; $i++) {
            $transit_time += $routes_arr[$i + 1]['departing_at']->diffInMinutes($routes_arr[$i]['arriving_at']);
        }

        return number_format($transit_time / 60 , 1);
    }

    public static function getReturnTransitTime($origin, $destination , $routes)
    {
        $transit_time  = 0;
        $routes_arr    = [];
        $add_to_array  = false;

        foreach ($routes as $key => $route) {
            if($route['flyFrom'] == $destination){
                $add_to_array = true;
            }

            if($add_to_array){
                $routes_arr[] = [
                    'origin'            => $route['flyFrom'],
                    'destination'       => $route['flyTo'],
                    'departing_at'      => Carbon::parse($route['local_departure']),
                    'arriving_at'       => Carbon::parse($route['local_arrival']),
                ];
            }
        }

        // Calculate transit time
        for ($i = 0; $i < count($routes_arr) - 1; $i++) {
            $transit_time += $routes_arr[$i + 1]['departing_at']->diffInMinutes($routes_arr[$i]['arriving_at']);
        }

        return number_format($transit_time / 60 , 1);
    }
}
