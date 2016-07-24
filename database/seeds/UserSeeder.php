<?php

use Reflex\Scorpio\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        
        factory(User::class)->create([
            'name' => 'Mike',
            'email' => 'contact@mikeshellard.me',
            'password' => bcrypt('changeme'),
        ]);
    }
}
