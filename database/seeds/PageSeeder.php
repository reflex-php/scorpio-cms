<?php

use Reflex\Scorpio\Page;
use Illuminate\Database\Seeder;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Page::truncate();

        Page::create([
            'title' => 'Home',
            'uri' => '/',
            'route_name' => 'scorpio.generated.home',
            'body' => 'Hello, World!',
            'theme_id' => 1,
        ]);

        $parent = Page::create([
            'title' => 'About',
            'uri' => '/about',
            'route_name' => 'scorpio.generated.about',
            'body' => 'Some info about us',
            'theme_id' => 1,
        ]);

        $parent->children()->create([
            'title' => 'Contact',
            'uri' => '/about/contact',
            'route_name' => 'scorpio.generated.about.contact',
            'body' => 'Contact us',
            'theme_id' => 1,
        ]);

        $parent->children()->create([
            'title' => 'Meet the Team',
            'uri' => '/about/team',
            'route_name' => 'scorpio.generated.about.meet',
            'body' => 'The team...',
            'theme_id' => 1,
        ]);
    }
}
