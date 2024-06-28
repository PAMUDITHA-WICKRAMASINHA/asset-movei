$(document).ready(function () {
    $("#more-movie-button").on("click", function () {
        var movieId = $(this).data('id');
        window.location.href = "/get-movie/" + movieId;
    });
});

$(document).ready(function () {
    $(".show-movie-button").on("click", function () {
        var movieId = $(this).data('id');
        window.location.href = "/get-movie/" + movieId;
    });
});