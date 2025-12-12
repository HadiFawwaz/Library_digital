<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->admin()->create([
            'name' => 'kyoz',
            'username' => 'adminkeren',
            'email' => 'admin@BiblioCore.com',
            'password' => Hash::make('password1'),
        ]);

        $this->call(BookSeeder::class);
    }
}
