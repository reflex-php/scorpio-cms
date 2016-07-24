<?php

use Reflex\Scorpio\Theme;
use Illuminate\Database\Seeder;

class ThemeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Theme::truncate();
            
        Theme::create([
            'name' => 'Default',
            'path' => 'default'
        ]);
    }
}
