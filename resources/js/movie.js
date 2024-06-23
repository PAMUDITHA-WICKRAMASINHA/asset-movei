$(document).ready(function() {
    $(document).on('click', '.download-link', function(event) {
        event.preventDefault();
        var formatId = $(this).data('format-id');
        var movieId = $(this).data('movie-id');

        $('#download-button').attr('href', '/movie/download/' + formatId + '/' + movieId);
        $('#downloadModal').show();
        var progress = 1;
        var interval = setInterval(function() {
            if (progress >= 100) {
                clearInterval(interval);
                $('#status').text('File Loading ...');
                setTimeout(function() {
                    $('#status').text('File loaded successfully !');
                    $('#download-button').show();
                }, 500);
            } else {
                progress++;
                $('#progress-bar').css('width', progress + '%').text(progress + '%');
                if (progress === 50) {
                    $('#status').text('File Loading ...');
                }
            }
        }, 100);
    });

    $('.close').on('click', function() {
        $('#downloadModal').hide();
    });

    $(window).on('click', function(event) {
        if ($(event.target).is('#downloadModal')) {
            $('#downloadModal').hide();
        }
    });

    $('#download-button').on('click', function() {
        $('#downloadModal').hide();
    });
});