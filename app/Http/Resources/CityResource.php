<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CityResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $image_url = $this->image_url;
        $image_url_org = $this->image_url_org;

        if (strpos($this->image_url, "/uploads/") === 0) {
            $image_url = asset($this->image_url);
        }

        if (strpos($this->image_url_org, "/uploads/") === 0) {
            $image_url_org = asset($this->image_url_org);
        }

        return [
            'id'            => $this->id,
            'name'          => $this->name . ', ' . $this->country,
            'name_ar'       => $this->name_ar ,
            'country'       => $this->country ,
            'code'          => $this->code ,
            'image_url'     => $image_url,
            'image_url_org' => $image_url_org,
        ];
    }
}
