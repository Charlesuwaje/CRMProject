<?php

namespace App\Http\Controllers;

use App\Http\Resources\OrganizationResource;
use App\Http\Resources\UniversalResource;
use App\Models\Organization;
use Illuminate\Http\Request;

class OrganizationController extends Controller
{
    public function viewOrganization(Request $request)
    {
        $validatedData = $request->validate([
            'organizationName' => 'nullable|string|max:255',
            'organizationId' => 'nullable',
        ]);

        $organizationId = Organization::with([
            'contacts',
            'organization',
            'organizationContact',
            'contactEmail',
            'contactPhones'
        ])
            ->when(!empty($validatedData['organizationName']), function ($query) use ($validatedData) {
                $query->where('name', 'like', '%' . $validatedData['organizationName'] . '%')
                    ->orWhere('type_of_business', 'like', '%' . $validatedData['organizationName'] . '%');
            })
            ->when(isset($validatedData['organizationId']), function ($query) use ($validatedData) {
                $query->where('organization_id', $validatedData['organizationId']);
            })
            ->get();

        if ($organizationId->isEmpty()) {
            return response()->json([
                'success' => false,
                'message' => 'No organization found',
                'data' => [],
                'statusCode' => 404,
            ]);
        }

        return response()->json([
            'success' => true,
            'message' => 'organization retrieved successfully',
            'data' => OrganizationResource::collection($organizationId),
            'statusCode' => 200,
        ]);
    }
}
