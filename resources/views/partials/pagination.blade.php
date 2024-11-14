@if ($paginator->hasPages())
    <nav>
        <div class="join">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <a aria-disabled="true" aria-label="@lang('pagination.previous')" class="join-item btn btn-disabled">«</a>
            @else
                <a rel="prev" aria-label="@lang('pagination.previous')" href="{{ $paginator->previousPageUrl() }}" class="join-item btn">«</a>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <a aria-disabled="true" class="join-item btn btn-disabled">{{ $element }}</a>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <a aria-current="page" class="join-item btn btn-active">{{ $page }}</a>
                        @else
                            <a href="{{ $url }}" class="join-item btn">{{ $page }}</a>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <a href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')" class="join-item btn">»</a>
            @else
                <a aria-disabled="true" aria-label="@lang('pagination.next')" class="join-item btn btn-disabled">»</a>
            @endif
        </div>
    </nav>
@endif
