<?php

use Reflex\Scorpio\Page;
use Reflex\Scorpio\User;
use Reflex\Scorpio\Theme;

Route::group(['prefix' => 'scorpio', 'middleware' => 'auth'], function () {
    Route::resource('page', PageController::class);
    Route::resource('theme', ThemeController::class);
    Route::get('theme/{theme}/apply', 'ThemeController@apply')
        ->name('scorpio.theme.apply');
    Route::post('theme/{theme}/replace', 'ThemeController@replaceThemeLayout')
        ->name('scorpio.theme.replace');
    Route::post('theme/{theme}/resource/{type}', 'ThemeController@saveResource')
        ->name('scorpio.theme.resource');
    Route::delete('theme/{theme}/resource/{type}', 'ThemeController@deleteResource')
        ->name('scorpio.theme.remove');

    Route::resource('navigation', NavigationController::class);

    Route::get('dashboard', ['as' => 'scorpio.home', 'uses' => function () {
        $pages = Page::latestFiveUpdated();
        $users = User::latestFive();
        $themes = Theme::latestTen();
        return view('scorpio.layouts.admin', compact('pages', 'users', 'themes'));
    }]);
});

Route::get('/theme-assets/{themeByDirectory}/{filename?}', 'AssetController@show')
    ->where('filename', '(.*)')
    ->name('scorpio.theme.asset');

Route::auth();

Route::get('/home', 'HomeController@index');

Route::get('/{pageBySlug}', 'DisplayController@show');
