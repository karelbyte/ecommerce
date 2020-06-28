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
            'email' => 'admin@ecommerce.com',
        ]);
        // Populate the user table with some data
        factory(User::class, 10)->create();

        \Laravel\Passport\Client::query()->create([
           'id' => 2,
           'name' => 'ecommerce',
           'secret' => 'LLxazzgHNfxkNv7xmdxOcfIZSmsg4EQjJ1BzJwpU',
           'provider' => 'users',
           'redirect' => '',
           'personal_access_client' => 0,
           'password_client' => 1,
           'revoked' => 0
        ]);
    }
}
