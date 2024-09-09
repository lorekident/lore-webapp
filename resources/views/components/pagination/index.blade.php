@if ($paginator->hasPages())
    <nav aria-label="Page navigation example">
        <ul class="inline-flex -space-x-px text-sm">
            @if ($paginator->onFirstPage())
                <li>
                    <span class="flex items-center justify-center px-4 py-3  h-full ms-0 leading-tight text-gray-500 bg-white border border-e-0 border-gray-300 rounded-s-lg cursor-not-allowed" aria-disabled="true">Previous</span>
                </li>
            @else
                <li>
                    <a href="{{ $paginator->previousPageUrl() }}" class="flex items-center justify-center px-4 py-3  h-full ms-0 leading-tight text-gray-500 bg-white border border-e-0 border-gray-300 rounded-s-lg hover:bg-gray-100 hover:text-gray-700">Previous</a>
                </li>
            @endif

            @foreach ($elements[0] as $page => $url)
                @if ($page == $paginator->currentPage())
                    <li>
                        <span class="flex items-center justify-center px-4 py-3  h-full text-blue-600 border border-gray-300 bg-blue-50">{{ $page }}</span>
                    </li>
                @else
                    <li>
                        <a href="{{ $url }}" class="flex items-center justify-center px-4 py-3  h-full text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700">{{ $page }}</a>
                    </li>
                @endif
            @endforeach

            @if ($paginator->hasMorePages())
                <li>
                    <a href="{{ $paginator->nextPageUrl() }}" class="flex items-center justify-center px-4 py-3  h-full leading-tight text-gray-500 bg-white border border-gray-300 rounded-e-lg hover:bg-gray-100 hover:text-gray-700">Next</a>
                </li>
            @else
                <li>
                    <span class="flex items-center justify-center px-4 py-3  h-full leading-tight text-gray-500 bg-white border border-gray-300 rounded-e-lg cursor-not-allowed" aria-disabled="true">Next</span>
                </li>
            @endif
        </ul>
    </nav>
@endif
