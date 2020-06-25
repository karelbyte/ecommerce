<?php

use Illuminate\Database\Seeder;
use App\Models\User;

class InitiatorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create admin user
        factory(User::class)->create([
            'name' => 'admin',
            'email' => 'admin@ecommer.com',
        ]);
        // Populate the user table with some data
        factory(User::class, 10)->create();
    }
}
