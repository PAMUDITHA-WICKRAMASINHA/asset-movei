<div class="card-container">
    @foreach ($movies as $movie)
    <div class="card-frame">
        <div class="card">
            <img src="{{ url($movie->image) }}" class="card-img-top" alt="Placeholder Image">
            <button id="show-movie-button" class="show-movie-button" data-id="{{ $movie->id }}">Download</button>
            <div class="card-body">
                <div class="card-name">{{$movie->title}} ({{ date('Y', strtotime($movie->release_date)) }})</div>
            </div>
        </div>
    </div>
    @endforeach
</div>