<?php

namespace Reflex\Scorpio\Http\Controllers;

use Reflex\Scorpio\Page;
use Illuminate\Http\Request;
use Reflex\Scorpio\Http\Requests;

class DisplayController extends Controller
{
    public function show(Page $page)
    {
        $theme = $page->theme;

        return view('scorpio.display.show', compact('theme', 'page'));
    }
}
