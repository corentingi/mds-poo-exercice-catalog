<ul>
    @foreach ($elements[0] as $page => $link)
    <li style="display:inline;">
        @if ($page == $paginator->currentPage())
        <span style="font-weight: bold;">{{ $page }}</span>
        @else
        <a href="{{ $link }}">{{ $page }}</a>
        @endif
    </li>
    @endforeach
</ul>
