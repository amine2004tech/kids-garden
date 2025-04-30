<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('users')->truncate(); // Clear existing users

        $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('password'),
            'is_admin' => true,
        ]);

        // Verify the admin was created
        if ($admin->exists) {
            $this->command->info('Admin user created successfully!');
            $this->command->info('Email: admin@admin.com');
            $this->command->info('Password: password');
        } else {
            $this->command->error('Failed to create admin user!');
        }
    }
} 