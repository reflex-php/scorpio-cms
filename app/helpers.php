<?php

use Reflex\Scorpio\Navigation;

function navigation($key, $class = '')
{
    $string = Navigation::pagesInNavigation($key)
        ->get()
        ->map(function ($page) {
            return '<li class="navigation-link" id="navigation-link-' . str_slug($page->title) . '">
                <a href="/' . $page->slug . '">' . $page->title . '</a>
            </li>';
        })
        ->implode('');

    return "<ul class=\"$class navigation-links\" id=\"navigation-{$key}\">{$string}</ul>";
}

function render_navigation(Navigation $navigation)
{
    $build = '<ul>';
    foreach ($navigation->pages as $subPage) {
        $findChildren = Navigation::find($subPage->id);
        if ($findChildren->exists) {
            $children = render_navigation($findChildren);
        } else {
            $children = '';
        }

        $build .= implode([
            '<li>',
                '<i class="fa-li fa fa-long-arrow-right"></i>',
                '{{ $subPage->title }}',
                '<a href="{{ route(\'scorpio.navigation.remove\', [$navigation->id, $subPage->id]) }}"><i class="fa fa-times"></i></a>',
                $children,
            '</li>',
        ], '');
    }

    $build .= '</ul>';
    return $build;
}
