$(document).ready(function() {
    $('#openSidebar').click(function() {
      var $sidebar = $("#sidebar");
      $sidebar.width($sidebar.width() === 320 ? 0 : 320);
    });
    $('.closebtn').click(function() {
      var $sidebar = $("#sidebar");
      $sidebar.width($sidebar.width() === 320 ? 0 : 320);
    });
});


$(document).ready(function() {
  var slides = $(".slide");
  var currentSlide = 0;
  nextSlide()
  var slideInterval = setInterval(nextSlide, 5000);

  function nextSlide() {
    slides.eq(currentSlide).removeClass("showing");
    currentSlide = (currentSlide + 1) % slides.length;
    slides.eq(currentSlide).addClass("showing");
  }

  function prevSlide() {
    slides.eq(currentSlide).removeClass("showing");
    currentSlide = (currentSlide - 1 + slides.length) % slides.length;
    slides.eq(currentSlide).addClass("showing");
  }

  $("#prevBtn").click(function() {
    prevSlide();
  });

  $("#nextBtn").click(function() {
    nextSlide();
  });

  $("#dropbtn-nav").click(function() {
    $(".dropdown-content").toggle();
  });
});


$(document).ready(function() {
  $("#dropbtn-nav").click(function() {
    var dropdownContent = $(this).next();
    dropdownContent.toggle();
    $(this).toggleClass("active", dropdownContent.is(":visible"));
  });
});
