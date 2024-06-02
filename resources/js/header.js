var slides = document.querySelectorAll(".slide");
var currentSlide = 0;

function toggleSidebar() {
    var sidebar = document.getElementById("sidebar");
    sidebar.style.width = sidebar.style.width === "320px" ? "0" : "320px";
}

nextSlide()

var slideInterval = setInterval(nextSlide,5000);
  
function nextSlide(){
  if(slides.length > 0){
    slides[currentSlide].classList.remove("showing");
    currentSlide = (currentSlide+1)%slides.length;
    slides[currentSlide].classList.add("showing");
  }
}

function prevSlide(){
  if(currentSlide > 0){
  slides[currentSlide].classList.remove("showing");
  currentSlide = (currentSlide-1)%slides.length;
  slides[currentSlide].classList.add("showing");
  }
}

var dropbtn = document.getElementById("dropbtn-nav");
var dropdownContent = dropbtn.nextElementSibling;

dropbtn.addEventListener("click", function() {
    if (dropbtn.classList.contains("active")) {
        dropbtn.classList.remove("active");
         dropdownContent.style.display = "none";
    } else {
        dropbtn.classList.add("active");
        dropdownContent.style.display = "block";
    }
});

