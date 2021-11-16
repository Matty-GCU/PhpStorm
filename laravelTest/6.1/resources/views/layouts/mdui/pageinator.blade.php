@if ($paginator->hasPages())
    <div class="mdui-row mdui-hidden-md-up">
        <div class="mdui-col-xs-6">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <a disabled
                   class="mdui-btn mdui-btn-block mdui-color-theme-accent mdui-btn-raised mdui-ripple">&laquo;</a>
            @else
                <a href="{{ $paginator->previousPageUrl() }}"
                   class="mdui-btn mdui-btn-block mdui-color-theme-accent mdui-btn-raised mdui-ripple">&laquo;</a>
            @endif
        </div>
        <div class="mdui-col-xs-6">
            {{-- Previous Page Link --}}
            @if ($paginator->hasMorePages())
                <a href="{{ $paginator->nextPageUrl() }}"
                   class="mdui-btn mdui-btn-block mdui-color-theme-accent mdui-btn-raised mdui-ripple">&raquo;</a>
            @else
                <a disabled
                   class="mdui-btn mdui-btn-block mdui-color-theme-accent mdui-btn-raised mdui-ripple">&raquo;</a>
            @endif
        </div>
        <div class="mdui-col-xs-12  mdui-m-l-1 mdui-m-r-1 mdui-text-center">
            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <a disabled class="mdui-btn mdui-btn-dense mdui-btn-icon mdui-color-theme-accent mdui-ripple">{{ $element }}</a>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <a href="{{ $url }}" class="mdui-btn mdui-btn-dense mdui-btn-icon mdui-color-theme-accent mdui-ripple">{{ $page }}</a>
                        @else
                            <a href="{{ $url }}"
                               class="mdui-btn mdui-btn-dense  mdui-btn-icon mdui-ripple">{{ $page }}</a>
                        @endif
                    @endforeach
                @endif
            @endforeach
        </div>
    </div>

    <div class="mdui-row mdui-hidden-sm-down">
        <div class="mdui-col-xs-2">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <a disabled
                   class="mdui-btn mdui-btn-block mdui-color-theme-accent mdui-btn-raised mdui-ripple">&laquo;</a>
            @else
                <a href="{{ $paginator->previousPageUrl() }}"
                   class="mdui-btn mdui-btn-block mdui-color-theme-accent mdui-btn-raised mdui-ripple">&laquo;</a>
            @endif
        </div>
        <div class="mdui-col-xs-8 mdui-text-center">
            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <a disabled class="mdui-btn mdui-btn-icon mdui-btn-dense mdui-color-theme-accent mdui-ripple">{{ $element }}</a>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <a href="{{ $url }}" class="mdui-btn mdui-btn-dense  mdui-btn-icon mdui-color-theme-accent mdui-ripple">{{ $page }}</a>
                        @else
                            <a href="{{ $url }}" class="mdui-btn mdui-btn-dense mdui-btn-icon mdui-ripple">{{ $page }}</a>
                        @endif
                    @endforeach
                @endif
            @endforeach
        </div>
        <div class="mdui-col-xs-2">
            {{-- Previous Page Link --}}
            @if ($paginator->hasMorePages())
                <a href="{{ $paginator->nextPageUrl() }}"
                   class="mdui-btn mdui-btn-block mdui-color-theme-accent mdui-btn-raised mdui-ripple">&raquo;</a>
            @else
                <a disabled
                   class="mdui-btn mdui-btn-block mdui-color-theme-accent mdui-btn-raised mdui-ripple">&raquo;</a>
            @endif
        </div>
    </div>
@endif
