<?php

namespace Database\Seeders;

use App\Models\Contact;
use App\Models\ContactEmail;
use App\Models\Email;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ContactEmailSeeder extends Seeder
{
    
    public function run()
    {
        if (Contact::count() === 0 || Email::count() === 0) {
            $this->command->warn('No contacts or emails available to seed contact_email data.');
            return;
        }

        Contact::all()->each(function ($contact) {
            Email::inRandomOrder()->take(2)->get()->each(function ($email) use ($contact) {
                ContactEmail::create([
                    'contact_id' => $contact->contact_id,
                    'email_id' => $email->email_id, 
                    'contact_email_type' => 'work',  
                    'is_primary_email' => false,
                ]);
            });
        });
    }
}
