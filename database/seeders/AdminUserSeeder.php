<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeder.
     *
     * @return void
     */
    public function run()
    {
        // Create default admin user
        User::firstOrCreate(
            ['email' => 'admin@aicontrol.com'],
            [
                'name' => 'Admin User',
                'email' => 'admin@aicontrol.com',
                'password' => Hash::make('admin123'),
                'role' => 'admin',
                'is_active' => true,
                'email_verified_at' => now(),
            ]
        );

        // Create a demo regular user
        User::firstOrCreate(
            ['email' => 'user@aicontrol.com'],
            [
                'name' => 'Demo User',
                'email' => 'user@aicontrol.com',
                'password' => Hash::make('user123'),
                'role' => 'user',
                'is_active' => true,
                'email_verified_at' => now(),
            ]
        );

        $this->command->info('Admin and demo users created successfully!');
        $this->command->info('Admin: admin@aicontrol.com / admin123');
        $this->command->info('User: user@aicontrol.com / user123');
    }
}
