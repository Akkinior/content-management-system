<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Role::create([
            'name' => 'Admin',
            'description' => 'Full system access and management'
        ]);

        \App\Models\Role::create([
            'name' => 'Editor',
            'description' => 'Can create and edit content'
        ]);

        \App\Models\Role::create([
            'name' => 'User',
            'description' => 'Basic user access'
        ]);
    }
}
