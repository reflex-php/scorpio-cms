<?php

namespace Reflex\Scorpio\Http\Controllers;

use Reflex\Scorpio\Page;
use Reflex\Scorpio\Theme;
use Illuminate\Http\Request;
use Illuminate\Routing\Router;
use Reflex\Scorpio\Http\Requests;
use Baum\MoveNotPossibleException;
use Reflex\Scorpio\Http\Requests\PageRequest;

class PageController extends Controller
{
    protected $pages;

    public function __construct()
    {
        $this->pages = Page::withDepth()->defaultOrder()->get();

        view()->share('pages', $this->pages);
        view()->share('page_hierarchy', $this->pages->toTree());
    }

    public function index()
    {
        return view('scorpio.page.index');
    }

    public function store(PageRequest $request)
    {
        $page = $request->persist();
        
        flash()->success('Awesome! New article created!');

        return redirect()->route('scorpio.page.edit', [$page->id]);
    }

    public function create()
    {
        $themes = Theme::lists('name', 'id');
        return view('scorpio.page.create', compact('themes'));
    }

    public function show(Page $page)
    {
        return redirect()->route('scorpio.page.edit', $page->id);
    }

    public function destroy(Page $page)
    {
        foreach ($page->children as $child) {
            $child->makeRoot();
        }

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
        try {
            $page = $request->persist($page);
            flash()->success('Awesome! Updated!');
        } catch (MoveNotPossibleException $e) {
            flash()->warning('Cannot make a page a child of itself');
        }
        
        return back();
    }

    public function activate(Page $page)
    {
        $page->activate();
        flash()->success('Page activated!');
        return back();
    }

    public function deactivate(Page $page)
    {
        $page->deactivate();
        flash()->warning('Page deactivated!');
        return back();
    }

    public function up(Page $page)
    {
        $sibling = $page->getPrevSibling();
        
        if ($page->isRoot() && $sibling) {
            $sibling->prependNode($page);
            flash()->success('Page \'' . $page->title . '\'  moved and is now part of \'' . $sibling->title . '\'');
            return back();
        }

        if (! $page->isRoot() && $sibling) {
            $page->up();
            flash()->success('Page \'' . $page->title . '\' moved up in tree');
            return back();
        } elseif ($parent = $page->parent) {
            $page->insertBeforeNode($parent);
            flash()->success('Page \'' . $page->title . '\' has now been made a root element');
            return back();
        }

        flash()->warning('No movement possible for  \'' . $page->title . '\'');
        return back();
    }

    public function down(Page $page)
    {
        $sibling = $page->getNextSibling();
        
        if ($page->isRoot() && $sibling) {
            $sibling->prependNode($page);
            flash()->success('Page \'' . $page->title . '\'  moved and is now part of \'' . $sibling->title . '\'');
            return back();
        }

        if (! $page->isRoot() && $sibling) {
            $page->down();
            flash()->success('Page \'' . $page->title . '\' moved down in tree');
            return back();
        } elseif ($parent = $page->parent) {
            $page->insertAfterNode($parent);
            flash()->success('Page \'' . $page->title . '\' has now been made a root element');
            return back();
        }

        flash()->warning('No movement possible for  \'' . $page->title . '\'');
        return back();
    }
}
