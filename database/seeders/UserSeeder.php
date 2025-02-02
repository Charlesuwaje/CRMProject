<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $companyIds = DB::table('company')->pluck('company_id')->toArray();

        if (empty($companyIds)) {
            $this->command->warn('No companies found. Please seed the "company" table first.');
            return;
        }

        $creatorId = DB::table('users')->insert([
            'first_name' => 'Admin',
            'last_name' => 'User',
            'user_name' => 'adminuser',
            'email' => 'admin@example.com',
            'password' => Hash::make('adminpassword'),
            'company_id' => $companyIds[array_rand($companyIds)],
            'created_by' => null,
            'modified_by' => null,
            'is_account_expired' => false,
            'is_account_locked' => false,
            'is_active' => true,
            'is_credentials_expired' => false,
            'last_password_reset_date' => now(),
            'mobile_number' => '1112223333',
            'user_profile_photo' => null,
            'zone_id' => null,
            'visibility_group_id' => null,
            'userset_id' => null,
            'dob' => '1985-01-01',
            'security_question' => 'What is your mother’s maiden name?',
            'security_answer' => 'Doe',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('users')->insert([
            [
                'first_name' => 'John',
                'last_name' => 'Doe',
                'user_name' => 'johndoe',
                'email' => 'john.doe@example.com',
                'password' => Hash::make('password123'),
                'company_id' => $companyIds[array_rand($companyIds)],
                'created_by' => $creatorId,
                'modified_by' => $creatorId,
                'is_account_expired' => false,
                'is_account_locked' => false,
                'is_active' => true,
                'is_credentials_expired' => false,
                'last_password_reset_date' => now(),
                'mobile_number' => '1234567890',
                'user_profile_photo' => null,
                'zone_id' => null,
                'visibility_group_id' => null,
                'userset_id' => null,
                'dob' => '1990-01-01',
                'security_question' => 'What is your favorite color?',
                'security_answer' => 'Blue',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'first_name' => 'Jane',
                'last_name' => 'Smith',
                'user_name' => 'janesmith',
                'email' => 'jane.smith@example.com',
                'password' => Hash::make('password123'),
                'company_id' => $companyIds[array_rand($companyIds)],
                'created_by' => $creatorId,
                'modified_by' => $creatorId,
                'is_account_expired' => false,
                'is_account_locked' => false,
                'is_active' => true,
                'is_credentials_expired' => false,
                'last_password_reset_date' => now(),
                'mobile_number' => '9876543210',
                'user_profile_photo' => null,
                'zone_id' => null,
                'visibility_group_id' => null,
                'userset_id' => null,
                'dob' => '1992-02-02',
                'security_question' => 'What is your pet’s name?',
                'security_answer' => 'Fluffy',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
