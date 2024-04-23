<div class="card-container">
    @foreach ($movies as $movie)
    <div class="card-frame">
        <div class="card" style="background-image: url('{{ Storage::url($movie->image) }}');">
            <button id="show-movie-button" class="show-movie-button" data-id="{{ $movie->id }}">Download</button>
        </div>
        <div class="card-name">{{$movie->title}} ({{ date('Y', strtotime($movie->release_date)) }})</div>
        <!-- Card name outside the card -->
    </div>
    @endforeach
</div>