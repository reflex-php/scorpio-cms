<ul class="fa-ul">
@foreach ($page_hierarchy as $page)
    <li>
        <a href="/scorpio/page/{{ $page->id }}/down"><i class="fa fa-1 fa-arrow-circle-down"></i></a>
        <a href="/scorpio/page/{{ $page->id }}/up"><i class="fa fa-1 fa-arrow-circle-up"></i></a>
        <a href="{{ url($page->uri) }}" target="_blank">{{ $page->title }}</a> 
    @if (count($page->children))
        @include('scorpio.page.partials.navigation', ['page_hierarchy' => $page->children])
    @endif
    </li>
@endforeach
</ul>