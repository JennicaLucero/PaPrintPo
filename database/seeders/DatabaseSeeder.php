<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; // Add this line to import DB
use App\Models\Service;
use App\Models\Order;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        
        DB::table('sessions')->truncate();
        DB::table('users')->truncate();
    
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $this->call(PrintingSuppliesSeeder::class);

        User::factory()->create([
            // 'name' => 'Test User',
            // 'email' => 'test@example.com',
            'name' => 'Admin',
            'email' => 'admin@mail.com',
            'usertype' => 'admin',
            'password' => 'password'
        ]);
    }
}
