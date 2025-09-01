<?php

namespace App\Http\Resources;


use Carbon\Carbon;

class AgodaSearchResource
{

    public static function toArray($request,$duration)
    {
        $response = [];
        foreach ($request as $property){

            $link = "https://www.agoda.com/" ;
            if( isset($property['content']['informationSummary']['propertyLinks']['propertyPage']) ){
                $link .= $property['content']['informationSummary']['propertyLinks']['propertyPage'];
            }
            $response [] = [
                'id'                    => $property['propertyId'],
                'name'                  => $property['content']['informationSummary']['defaultName'],
                'address'               => self::getAddress($property),
                'pricing'               => self::getPricing($property,$duration),
                'images'                => self::getImages($property['content']['images']['hotelImages']),
                'rating'                => $property['content']['informationSummary']['rating'],
                'link'                  => $link,
                'provider'              => 'AGODA',
            ];
        }

        return $response;
    }

    public static function getAddress($property)
    {
        return [
            'area'      => $property['content']['informationSummary']['address']['area']['name'],
            'city'      => $property['content']['informationSummary']['address']['city']['name'],
            'country'   => $property['content']['informationSummary']['address']['country']['name'],
        ];
    }

    public static function getPricing($property,$duration)
    {
        return [
//            'currency'  =>  isset($property['pricing']['offers'][0]) ? $property['pricing']['offers'][0]['roomOffers'][0]['room']['pricing'][0]['currency'] : null ,
            'value'     =>  isset($property['pricing']['offers'][0])? $property['pricing']['offers'][0]['roomOffers'][0]['room']['pricing'][0]['price']['perRoomPerNight']['inclusive']['originalPrice'] * $duration : null ,
        ];
    }

    public static function getImages($images)
    {
        $image_urls = [];

        foreach ($images as $key => $image){
            $image_urls []  =  [
                'caption'      => $image['caption'],
                'url'         => $image['urls'][0]['value'],
            ];

        }
        return $image_urls;
    }
}
