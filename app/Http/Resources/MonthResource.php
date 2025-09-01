<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MonthResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id'        => $this->id,
            'name'      => $this->name,
            'cities'    => self::getCities($this->cities),
        ];
    }

    public static function getCities($cities)
    {
        $cities_arr = [];

        foreach ($cities as $city){

            $image_url     = $city->image_url;
            $image_url_org = $city->image_url_org;

            if (strpos($city->image_url, "/uploads/") === 0) {
                $image_url = asset($city->image_url);
            }

            if (strpos($city->image_url_org, "/uploads/") === 0) {
                $image_url_org = asset($city->image_url_org);
            }

            $cities_arr [] = [
                'id'        => $city->id,
                'name'      => $city->name  . ', ' . $city->country,
                'name_ar'      => $city->name_ar,
                'image_url' => $image_url,
                'image_url_org' => $image_url_org
            ];
        }

        return $cities_arr;
    }
}
