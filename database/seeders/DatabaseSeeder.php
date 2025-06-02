<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        User::create([
            'role_id' => User::SUPER_ADMIN_ROLE_ID,
            'name' => 'super admin',
            'email' => 'super@admin.com',
            'password' => bcrypt('superadmin')
        ]);
    }
}
