@foreach ($pages as $page)
    <li class="nav-item {{ Request::is($page->uri . '*') ? 'active' : '' }} {{ count($page->children) ? ($page->isChild() ? 'dropdown-submenu' : 'dropdown') : '' }}">
        <a href="{{ url($page->uri) }}" class="nav-link">
            {{ $page->title }}
            @if (count($page->children))
                <span class="fa fa-caret-{{ $page->isChild() ? 'right' : 'down' }}"></span>
            @endif
        </a>
        @if (count($page->children))
            <ul class="dropdown-menu">
                @include($theme->path . '.partials.navigation', ['pages' => $page->children])
            </ul>
        @endif
    </li>
@endforeach