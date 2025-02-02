<?php

namespace App\Http\Controllers;

use App\Http\Resources\ContactResource;
use App\Http\Resources\UniversalResource;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{

    public function viewContact(Request $request)
    {
        $validatedData = $request->validate([
            'contactName' => 'nullable|string|max:255',
            'contactId' => 'nullable',
        ]);

        $contacts = Contact::with([
            'ContactPhone',
            'organization',
            'contactEmail',
            'organizationContact',
        ])
            ->when(!empty($validatedData['contactName']), function ($query) use ($validatedData) {
                $query->where('first_name', 'like', '%' . $validatedData['contactName'] . '%')
                    ->orWhere('last_name', 'like', '%' . $validatedData['contactName'] . '%');
            })
            ->when(isset($validatedData['contactId']), function ($query) use ($validatedData) {
                $query->where('contact_id', $validatedData['contactId']);
            })
            ->get();

        if ($contacts->isEmpty()) {
            return response()->json([
                'success' => false,
                'message' => 'No contacts found',
                'data' => [],
                'statusCode' => 404,
            ]);
        }

        return response()->json([
            'success' => true,
            'message' => 'Contacts retrieved successfully',
            'data' => UniversalResource::collection($contacts),
            'statusCode' => 200,
        ]);
    }
}
