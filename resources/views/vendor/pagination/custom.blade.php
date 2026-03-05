@if ($paginator->hasPages())
    <nav class="custom-pagination-bar">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <span class="custom-pagination-arrow disabled">&lsaquo;</span>
        @else
            <a href="{{ $paginator->previousPageUrl() }}" rel="prev" class="custom-pagination-arrow">&lsaquo;</a>
        @endif

        {{-- Pagination Elements --}}
        <div class="custom-pagination-pages">
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <span class="custom-pagination-dots">{{ $element }}</span>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <span class="custom-pagination-page active">{{ $page }}</span>
                    @else
                        <a href="{{ $url }}" class="custom-pagination-page">{{ $page }}</a>
                    @endif
                @endforeach
            @endif
        @endforeach
        </div>

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" rel="next" class="custom-pagination-arrow">&rsaquo;</a>
        @else
            <span class="custom-pagination-arrow disabled">&rsaquo;</span>
        @endif
    </nav>
    <style>
    .custom-pagination-bar {
        width: 100vw;
        max-width: 100%;
        margin: 2.5rem 0 1.5rem 0;
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 2vw;
        background: transparent;
        position: relative;
        left: 50%;
        right: 50%;
        transform: translateX(-50%);
    }
    .custom-pagination-arrow {
        font-size: 1.7rem;
        color: #1e3a8a;
        padding: 0.2rem 0.7rem;
        border-radius: 8px;
        background: #f3f4f6;
        text-decoration: none;
        transition: background 0.2s, color 0.2s;
        user-select: none;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .custom-pagination-arrow.disabled {
        opacity: 0.3;
        pointer-events: none;
        background: #f3f4f6;
    }
    .custom-pagination-pages {
        display: flex;
        gap: 0.3rem;
        flex-wrap: wrap;
    }
    .custom-pagination-page {
        padding: 0.25rem 0.7rem;
        border-radius: 6px;
        color: #6d28d9;
        background: #f3f4f6;
        text-decoration: none;
        font-size: 1rem;
        font-weight: 500;
        transition: background 0.2s, color 0.2s;
        margin: 0 1px;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .custom-pagination-page.active {
        background: #ede9fe;
        color: #6d28d9;
        font-weight: bold;
        box-shadow: 0 2px 8px rgba(109,40,217,0.07);
    }
    .custom-pagination-dots {
        color: #6d28d9;
        padding: 0.25rem 0.7rem;
        font-size: 1rem;
        opacity: 0.7;
    }
    @media (max-width: 600px) {
        .custom-pagination-bar {
            gap: 1vw;
        }
        .custom-pagination-page, .custom-pagination-arrow {
            font-size: 0.95rem;
            padding: 0.18rem 0.5rem;
        }
    }
    </style>
@endif
