@if ($paginator->hasPages())
    <nav class="pagination">
        {{-- Previous Page Link --}}
        <ul class="pagination-list">
            @if ($paginator->onFirstPage())
                <li><a class="pagination-previous is-disabled"><span>&laquo;</span></a></li>
            @else
                <li><a class="pagination-previous" href="{{ $paginator->previousPageUrl() }}" rel="prev">&laquo;</a></li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                   <li><span class="pagination-ellipsis">&hellip;</span></li>
                    {{-- <li class="disabled"><span>{{ $element }}</span></li> --}}
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="pagination-link is-current"><span>{{ $page }}</span></li>
                        @else
                            <li><a class="pagination-link" href="{{ $url }}">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li><a class="pagination-next" href="{{ $paginator->nextPageUrl() }}" rel="next">&raquo;</a></li>
            @else
                <li class="pagination-next is-disabled"><span>&raquo;</span></li>
            @endif
        </ul>
    </nav>
@endif
