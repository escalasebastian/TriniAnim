<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        
        // Esto llamam a UserFactory
        //\App\Models\User::factory(0)->create();
        //Creamos un UserSeeder y desde ahí se llama al userFactory
        $this->call(UserSeeder::class);
        // Esto llama a AdminSeeder para que ejecute su metodo run
        $this->call(AdminSeeder::class);
    }
}
