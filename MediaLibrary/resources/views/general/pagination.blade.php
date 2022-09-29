@if ($paginator->hasPages())
<style type="text/css">
    li.page-item a{
        background-color: #fff;
        border: none;
    }

    .page-link:focus{
        box-shadow: 0 0 0 0.2rem rgba(103, 154, 7, 0.2);
    }

    li.disabled{
        background-color: #fff;
        color: #000;
        border: none;
    }

    li.disabled:hover{
        background-color: #C8C8C8;
        color: #000;
        border: none;
    }

    li.active{
        background-color: rgb(129 61 129);
        color: white;
        border: none;
    }

    .page-link:hover{
        background-color: rgb(170, 111, 170);
        border: none;
    }

    .page-link.active:hover{
        background-color: rgb(170, 111, 170);
        color: white;
        border: none;
    }

</style>
<nav aria-label="Page navigation">
    <ul class="pagination">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <li class="disabled page-link"><span>&laquo;</span></li>
        @else
            <li class="page-item"><a class="page-link title" href="{{ $paginator->previousPageUrl() }}" rel="prev">&laquo;</a></li>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <li class="disabled page-item"><span>{{ $element }}</span></li>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="active page-link"><span>{{ $page }}</span></li>
                    @else
                        <li class="page-item"><a class="page-link title" href="{{ $url }}">{{ $page }}</a></li>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li class="page-item"><a class="page-link title" href="{{ $paginator->nextPageUrl() }}" rel="next">&raquo;</a></li>
        @else
            <li class="disabled page-link"><span>&raquo;</span></li>
        @endif
    </ul>
</nav>
@endif