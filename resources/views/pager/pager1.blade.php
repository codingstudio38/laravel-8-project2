@if ($paginator->hasPages())
<style>
    @media screen and (max-width: 400px) {

        li.page-item {

            display: none;
        }

        .page-item:first-child,
        .page-item:nth-child(2),
        .page-item:nth-last-child(2),
        .page-item:last-child,
        .page-item.active,
        .page-item.disabled {

            display: block;
        }
    }

</style>

<nav aria-label="Page navigation example">

    <ul class="pagination">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
        <li class="page-item disabled"><a class="page-link" href="javascript:void(0)">«</a></li>

        @else
        <li class="page-item"><a href="{{ $paginator->previousPageUrl() }}" class="page-link" rel="prev">«</a></li>
        @endif

        @if ($paginator->currentPage() > 3)
        <li class="page-item"><a class="page-link" href="{{ $paginator->url(1) }}">1</a></li>
        @endif
        @if ($paginator->currentPage() > 4)
        <li class="page-item"><a class="page-link" href="javascript:void(0)">...</a></li>
        @endif
        @foreach (range(1, $paginator->lastPage()) as $i)
        @if ($i >= $paginator->currentPage() - 2 && $i <= $paginator->currentPage() + 2)
            @if ($i == $paginator->currentPage())
            <li class="page-item active"><a class="page-link">{{ $i }}</a></li>
            @else
            <li class="page-item"><a class=" page-link" href="{{ $paginator->url($i) }}">{{ $i }}</a></li>
            @endif
            @endif
            @endforeach
            @if ($paginator->currentPage() < $paginator->lastPage() - 3)
                <li class="page-item"><a class="page-link" href="javascript:void(0)">...</a></li>
                @endif
                @if ($paginator->currentPage() < $paginator->lastPage() - 2)
                    <li class="page-item"><a class="page-link" href="{{ $paginator->url($paginator->lastPage()) }}">{{ $paginator->lastPage() }}</a></li>
                    @endif
                    @if ($paginator->hasMorePages())
                    <li class="page-item"><a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next">»</a></li>
                    @else
                    <li class="page-item disabled"><a class="page-link" href="javascript:void(0)">»</a></li>
                    @endif
    </ul>
</nav>

@endif
