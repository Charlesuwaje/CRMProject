<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UniversalResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    // return parent::toArray($request);


    public function toArray(Request $request): array
    {
        return [
            'id' => $this->contact_id,
            'name' => $this->when(isset($this->name), $this->name),
            'first_name' => $this->when(isset($this->first_name), $this->first_name),
            'last_name' => $this->when(isset($this->last_name), $this->last_name),
            'dob' => $this->when(isset($this->dob), $this->dob),
            'gender' => $this->when(isset($this->gender), $this->gender),
            'description' => $this->when(isset($this->description), $this->description),
            'organization_id' => $this->when(isset($this->organization_id), $this->organization_id),
            'created_at' => $this->when(isset($this->created_at), $this->created_at),


            'contact_email_details' => [
                $this->whenLoaded('contactEmail', $this->contactEmail),
            ],
            'Contact_phone_details' => [
                $this->whenLoaded('ContactPhone', $this->ContactPhone),
            ],
            'organization_details' => [
                $this->whenLoaded('organization', $this->organization),
            ],
            'organizations_contact_details' => [
                $this->whenLoaded('organizationContact', $this->organizationContact)
            ],

        ];
    }
}
