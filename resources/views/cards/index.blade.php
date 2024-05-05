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