<?php

namespace Reflex\Scorpio\Http\Controllers;

use Reflex\Scorpio\Page;
use Illuminate\Http\Request;
use Reflex\Scorpio\Http\Requests;

class DisplayController extends Controller
{
    public function show(Page $page)
    {
        if (! $page->exists) {
            return response(view('scorpio.content.page-not-found'), 404);
        }

        $theme = $page->theme;

        if (! $theme) {
            return view('scorpio.content.no-theme');
        }

        $pages = Page::all()->toHierarchy();

        return view('scorpio.display.show', compact('theme', 'page', 'pages'));
    }
}
