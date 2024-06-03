$('.minimize-btn').click(function() {
    $('#sidebar').toggleClass('minimized');
    $('.sidebar h2').toggleClass('hidden');
    $('.sidebar a span').toggleClass('hidden');
    $('.submenu-toggle').toggleClass('hidden');
});


$('.submenu-item').click(function(event) {
    const submenuId = $(this).attr('data-submenu-id');
    event.preventDefault();
    const submenu = $('#' + submenuId);
    submenu.toggleClass('show');
    const submenuToggleIcon = $(event.currentTarget).find('.submenu-toggle');
    submenuToggleIcon.toggleClass('fa-chevron-down fa-chevron-up');
});