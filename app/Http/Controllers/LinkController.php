<?php

namespace Reflex\Scorpio\Http\Controllers;

use Reflex\Scorpio\Page;
use Illuminate\Http\Request;
use Reflex\Scorpio\Link;
use Reflex\Scorpio\Http\Requests;
use Reflex\Scorpio\Http\Requests\LinkRequest;

class LinkController extends Controller
{
    public function index()
    {
        $navigations = Link::parentsOnly();

        return view('scorpio.link.index', compact('navigations'));
    }

    public function create()
    {
        $pages = Page::all();
        return view('scorpio.link.create', compact('pages'));
    }

    public function store(LinkRequest $request)
    {
        $navigation = $request->persist();

        flash()->success('Awesome! Navigation created!');

        return redirect(route('scorpio.link.edit', [$navigation->id]));
    }

    public function edit(Navigation $navigation)
    {
        $pages = Page::all();
        return view('scorpio.link.edit', compact('navigation', 'pages'));
    }

    public function update(LinkRequest $request, Navigation $navigation)
    {
        $request->update($navigation);

        flash()->success('Okay, navigation has been updated');

        return back();
    }

    public function destroy(Navigation $navigation)
    {
        $navigation->delete();

        flash()->success('Okay, navigation deleted!');

        return back();
    }

    public function remove(Navigation $navigation, Page $page)
    {
        $navigation->pages()->detach($page);

        flash()->success('Okay! Page removed from the navigation!');

        return back();
    }
}
