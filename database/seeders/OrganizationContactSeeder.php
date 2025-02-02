<?php
namespace Database\Seeders;

use App\Models\Contact;
use App\Models\Organization;
use App\Models\OrganizationContact;
use Illuminate\Database\Seeder;

class OrganizationContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Organization::all()->each(function ($organization) {
            $contacts = Contact::inRandomOrder()->take(3)->get();

            if ($contacts->isEmpty()) {
                \Log::error("No contacts found for organization: {$organization->id}");
                return;
            }

            $contacts->each(function ($contact) use ($organization) {
                // OrganizationContact::create([
                //     'organization_id' => $organization->id,
                //     'contact_id' => $contact->id,
                //     'is_primary_contact' => $contact->id % 2 === 0,
                // ]);
                OrganizationContact::factory()->count(10)->create();

            });
        });
    }
}
