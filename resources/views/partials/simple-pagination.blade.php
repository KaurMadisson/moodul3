<style>
    .pagination {
        
        display: flex;

    }


</style>

@if ($paginator->hasPages())
    <nav>
        <div class="join grid grid-cols-2">
            <ul class="pagination"> {{-- Update the class name --}}
                {{-- Previous Page Link --}}
                @if ($paginator->onFirstPage())
                    <li class="disabled" aria-disabled="true"><span>@lang('pagination.previous')</span></li>
                @else
                    <li><a class="join-item btn btn-neutral" href="{{ $paginator->previousPageUrl() }}" rel="prev">@lang('pagination.previous')</a></li>
                @endif
                {{-- Next Page Link --}}
                @if ($paginator->hasMorePages())
                    <li><a class="join-item btn btn-neutral" href="{{ $paginator->nextPageUrl() }}" rel="next">@lang('pagination.next')</a></li>
                @else
                    <li class="disabled" aria-disabled="true"><span>@lang('pagination.next')</span></li>
                @endif
            </ul>
        </div>
    </nav>
@endif
