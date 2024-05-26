<div class="card-container">
    @foreach ($movies as $movie)
    <div class="card-frame">
        <div class="card">
            <a href="/get-movie/{{ $movie->id }}">
                <img src="{{ url($movie->image) }}" class="card-img-top" alt="Placeholder Image">
            </a>
            <div class="card-name">
                {{ strlen($movie->title) > 23 ? substr($movie->title, 0, 23) . '...' : $movie->title }}
            </div>
            <div class="card-year">
                {{ date('Y', strtotime($movie->release_date)) }}
            </div>
        </div>
    </div>
    @endforeach
</div>

@php
$totalPages = ceil($totalMovies / $perPage);
@endphp

@if ($totalPages > 1)
<div class="pagination">
    @if ($currentPage > 1)
    <a href="{{ url()->current() }}?page={{ $currentPage - 1 }}" class="pagination-button">Previous</a>
    @endif

    @for ($i = 1; $i <= $totalPages; $i++) <a href="{{ url()->current() }}?page={{ $i }}"
        class="pagination-button {{ $i == $currentPage ? 'active' : '' }}">{{ $i }}</a>
        @endfor

        @if ($currentPage < $totalPages) <a href="{{ url()->current() }}?page={{ $currentPage + 1 }}"
            class="pagination-button">Next</a>
            @endif
</div>
@endif