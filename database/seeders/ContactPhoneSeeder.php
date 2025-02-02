<?php

namespace Database\Seeders;

use App\Models\Contact;
use App\Models\ContactPhone;
use App\Models\Phone;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ContactPhoneSeeder extends Seeder
{
    
    public function run()
    {
        if (Contact::count() === 0 || Phone::count() === 0) {
            $this->command->warn('No contacts or phones available to seed contact_phone data.');
            return;
        }

        Contact::all()->each(function ($contact) {
            Phone::inRandomOrder()->take(2)->get()->each(function ($phone) use ($contact) {
                ContactPhone::create([
                    'contact_id' => $contact->contact_id,
                    'phone_id' => $phone->phone_id, 
                    'contact_phone_type' => 'mobile',
                    'is_primary_phone' => false,
                ]);
            });
        });
    }
}
