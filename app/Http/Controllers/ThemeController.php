<?php

namespace Reflex\Scorpio\Http\Controllers;

use Reflex\Scorpio\Page;
use Reflex\Scorpio\Theme;
use Illuminate\Http\Request;
use Reflex\Scorpio\Http\Requests;
use Illuminate\Support\Facades\Storage;
use Reflex\Scorpio\Http\Requests\ThemeRequest;
use Symfony\Component\HttpFoundation\File\Exception\FileException;

class ThemeController extends Controller
{
    protected function getAssets(Theme $theme)
    {
        $disk = Storage::disk('layouts');

        $javascripts = collect($disk->files($theme->path . '/js'))->map(function ($element) {
            return basename($element);
        })->toArray();
        $stylesheets = collect($disk->files($theme->path . '/css'))->map(function ($element) {
            return basename($element);
        })->toArray();
        $images      = collect($disk->files($theme->path . '/images'))->map(function ($element) {
            return basename($element);
        })->toArray();
        $partials    = collect($disk->files($theme->path . '/partials'))->map(function ($element) {
            return basename($element);
        })->toArray();

        return (object) compact('javascripts', 'stylesheets', 'images', 'partials');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $themes = Theme::latest()->get();
        return view('scorpio.theme.index', compact('themes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('scorpio.theme.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ThemeRequest $request)
    {
        $theme = Theme::create($request->all());

        flash()->success('Woo! New theme!');

        return redirect(route('scorpio.theme.edit', [$theme->id]));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Theme $theme)
    {
        $assets = $this->getAssets($theme);
        return view('scorpio.theme.edit', compact('theme', 'assets'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ThemeRequest $request, Theme $theme)
    {
        $theme->update($request->all());

        flash()->success('Nice! We are all up to date!');

        return back();
    }

    public function apply(Theme $theme)
    {
        $pages = Page::notUsing($theme);
        $theme_id = $theme->id;

        $pages->each(function ($page) use ($theme, $theme_id) {
            $page->update(compact('theme_id'));
        });

        flash()->success("Updated! All pages using the theme '$theme->name'!");

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Theme $theme)
    {
        if ($theme->pagesAssociated()) {
            flash('Pages are still associated with this theme', 'warning')->important();

            return back();
        }

        $theme->delete();
        
        flash()->success('Done and dusted, theme deleted!');

        return back();
    }

    public function deleteResource(Request $request, Theme $theme, $type)
    {
        $name = str_replace($theme->path . '/' . $type . '/', '', $request->file);
        $path = $theme->path . '/' . $type .  '/' . $name;
        $disk = Storage::disk('layouts');

        if (! $disk->exists($path)) {
            return $this->badResponse('File does not exist');
        }

        if ($disk->delete($path)) {
            return $this->goodResponse();
        }

        return $this->badResponse('Could not delete file');
    }

    public function saveResource(Request $request, Theme $theme, $type)
    {
        $disk = Storage::disk('layouts');
        if ('layout' != $type) {
            $path = config('filesystems.disks.layouts.root') . '/' . $theme->path . '/' . $type . '/';
        } else {
            $path = config('filesystems.disks.layouts.root') . '/' . $theme->path . '/';
        }

        $accept = null;

        switch ($type) {
            case 'css':
                $accept = ['text/css'];
                break;
            case 'js':
                $accept = ['application/javascript'];
                break;
            case 'images':
                $accept = ['image/png', 'image/jpeg'];
                break;
            case 'partials':
            case 'layout':
                $accept = ['text/php'];
                break;
            case 'default':
                return $this->badResponse();
                break;
        }

        $file = $request->file;
        $mime = $file->getClientMimeType();

        if (! in_array($mime, $accept)) {
            return $this->badResponse();
        }

        try {
            $file->move($path, $file->getClientOriginalName());
        } catch (FileException $e) {
            return $this->badResponse($e->getMessage());
        }

        return $this->goodResponse(['fullpath' => '/' . $type . '/' . $file->getClientOriginalName()]);
    }

    protected function badResponse($message)
    {
        return response(['error' => $message], 400);
    }

    protected function goodResponse(array $extra = [])
    {
        return response(['success' => true] + $extra, 200);
    }
}
