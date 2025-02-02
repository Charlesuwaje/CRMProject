<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ContactResource extends JsonResource
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
            'contactId' => $this->contactId,
            'firstName' => $this->firstName,
            'lastName' => $this->lastName,
            'gender' => $this->gender,
            'dob' => $this->dob,
            'source' => $this->source,
            'occupation' => $this->occupation,
            'description' => $this->description,
            'phones' => ContactPhoneResource::collection($this->whenLoaded('phones')),
            'emails' => ContactEmailResource::collection($this->whenLoaded('emails')),
            'organizations' => OrganizationResource::collection($this->whenLoaded('organizations')),
            'contactAddress' => ContactAddressResource::collection($this->whenLoaded('addresses')),
            'contactNotes' => $this->contactNotes,
            'contactAttachments' => $this->contactAttachments,
        ];
    }
}
