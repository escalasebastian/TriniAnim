<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //\App\Models\User::factory(1)->create(['is_admin' => true]);
        User::create(['name'=> 'Admin', 'userName'=>'admin', 'password'=> 'admin', 'is_admin' => true]); // 1 es true
    }
}
