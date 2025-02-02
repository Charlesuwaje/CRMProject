<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ContactPhoneResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        // return parent::toArray($request);
        return [
            'phoneId' => $this->phoneId,
            'countryCode' => $this->countryCode,
            'stdCode' => $this->stdCode,
            'phoneNo' => $this->phoneNo,
            'contactPhoneType' => $this->contactPhoneType,
        ];

    }
}
