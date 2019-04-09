@if ($paginator->hasPages())
    <div class="row no-margin center">
        <ul class="pagination" role="navigation">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li>
                    <span aria-hidden="true"><i class="material-icons notranslate">chevron_left</i></span>
                </li>
            @else
                <li class="mdc-button">
                    <a href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">
                        <span aria-hidden="true"><i class="material-icons notranslate">chevron_left</i></span>
                    </a>
                </li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li class="disabled" aria-disabled="true"><span>{{ $element }}</span></li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        <li class="mdc-button @if($page == $paginator->currentPage())mdc-button--unelevated current @endif"><a href="{{ $url }}">{{ $page }}</a></li>
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li>
                    <a href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">
                        <i class="material-icons notranslate">chevron_right</i>
                    </a>
                </li>
            @else
                <li class="disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                    <span aria-hidden="true"><i class="material-icons notranslate">chevron_right</i></span>
                </li>
            @endif
        </ul>
    </div>
@endif
