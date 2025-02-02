<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\DB;

class OrganizationResource extends JsonResource
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
            'contacts' => $this->whenLoaded('contacts', function () {
                return $this->contacts->load(['ContactPhone', 'ContactEmail']);
            }),
            'organization' => [
                $this->whenLoaded('organization', $this->organization),
            ],
            'organizationContact' => [
                $this->whenLoaded('organizationContact', $this->organizationContact),
            ]
        ];
    }
}
