@if ($paginator->hasPages())
    <div class="pagination-container pagination-container">
        <nav>
            {{-- Previous Page Link --}}
            @if (!$paginator->onFirstPage())
                <a class="prev-chap mdc-icon-button btn btn-default" href="{{ $paginator->previousPageUrl() }}" rel="prev">
                    Trang trước
                </a>
            @endif

            <ul class="pagination">
                @if($paginator->currentPage() > 3)
                    <li class="hidden-xs"><a class="mdc-icon-button" href="{{ $paginator->url(1) }}"><span class="icon-text">1</span></a></li>
                @endif
                @if($paginator->currentPage() > 4)
                    <li><span>...</span></li>
                @endif

                @foreach(range(1, $paginator->lastPage()) as $i)
                    @if($i >= $paginator->currentPage() - 2 && $i <= $paginator->currentPage() + 2)
                        @if ($i == $paginator->currentPage())
                            <li class="nav-active"><a class="mdc-icon-button active" href="#"><span class="icon-text">{{ $i }}</span></a></li>
                        @else
                            <li><a class="mdc-icon-button"href="{{ $paginator->url($i) }}"><span class="icon-text">{{ $i }}</span></a></li>
                        @endif
                    @endif
                @endforeach

                @if($paginator->currentPage() < $paginator->lastPage() - 3)
                    <li><span>...</span></li>
                @endif
                @if($paginator->currentPage() < $paginator->lastPage() - 2)
                    <li class="hidden-xs">
                        <a class="mdc-icon-button" href="{{ $paginator->url($paginator->lastPage()) }}"><span class="icon-text">{{ $paginator->lastPage() }}</span></a>
                    </li>
                @endif
            </ul>

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <a class="next-chap mdc-icon-button btn btn-default " href="{{ $paginator->nextPageUrl() }}" rel="next">
                    Trang sau
                </a>
            @endif
        </nav>
    </div>
@endif