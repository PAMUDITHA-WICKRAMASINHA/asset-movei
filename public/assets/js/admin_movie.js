$(document).ready(function () {
    var selectedDirectors = [];
    var selectedCategory = [];
    var selectedTopCast = [];
    
    //directores
    $('#director').on('change', function () {
        $('#director option:selected').each(function () {
            selectedDirectors.push($(this).text());
        });
        displaySelectedDirectors();
    });

    function displaySelectedDirectors() {
        var selectedDirectorsHtml = '';
        $.each(selectedDirectors, function(index, directorName) {
            selectedDirectorsHtml += '<p>' + directorName + ' <button class="close-btn" data-index="' + index + '">Close</button></p>';
        });
        $('#selected-directors').html(selectedDirectorsHtml);
    }

    $('#selected-directors').on('click', '.close-btn', function() {
        var indexToRemove = $(this).data('index');
        selectedDirectors.splice(indexToRemove, 1);
        displaySelectedDirectors();
    });

    //category
    $('#category').on('change', function () {
        $('#category option:selected').each(function () {
            selectedCategory.push($(this).text());
        });
        displaySelectedCategory();
    });

    function displaySelectedCategory() {
        var selectedCategoryHtml = '';
        $.each(selectedCategory, function(index, categoryName) {
            selectedCategoryHtml += '<p>' + categoryName + ' <button class="close-btn" data-index="' + index + '">Close</button></p>';
        });
        $('#selected-categories').html(selectedCategoryHtml);
    }

    $('#selected-categories').on('click', '.close-btn', function() {
        var indexToRemove = $(this).data('index');
        selectedCategory.splice(indexToRemove, 1);
        displaySelectedCategory();
    });
});