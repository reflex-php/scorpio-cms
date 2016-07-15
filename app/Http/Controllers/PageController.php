<?php

namespace Reflex\Scorpio\Http\Controllers;

use Reflex\Scorpio\Page;
use Reflex\Scorpio\Theme;
use Illuminate\Http\Request;
use Reflex\Scorpio\Http\Requests;
use Reflex\Scorpio\Http\Requests\PageRequest;

class PageController extends Controller
{
    public function index()
    {
        $pages = Page::latest('updated_at')->get();

        return view('scorpio.page.index', compact('pages'));
    }

    public function store(PageRequest $request)
    {
        if (! $request->slug) {
            $request->slug = str_slug($request->title);
        }

        $page = Page::create($request->all());

        flash()->success('Awesome! New article created!');

        return redirect(route('scorpio.page.edit', [$page->id]));
    }

    public function create()
    {
        $themes = Theme::lists('name', 'id');
        return view('scorpio.page.create', compact('themes'));
    }

    public function destroy(Page $page)
    {
        $page->delete();

        flash()->success('Okay, page deleted!');

        return back();
    }

    public function edit(Page $page)
    {
        $themes = Theme::lists('name', 'id');
        return view('scorpio.page.edit', compact('page', 'themes'));
    }

    public function update(PageRequest $request, Page $page)
    {
        $page->update($request->all());
        flash()->success('Awesome! Updated!');
        return back();
    }
}
