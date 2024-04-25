// var scene = document.getElementById("scene");
// var parallaxInstance = new Parallax(scene);

var slides = document.querySelectorAll(".slide");
var currentSlide = 0;

function toggleSidebar() {
    var sidebar = document.getElementById("sidebar");
    sidebar.style.width = sidebar.style.width === "320px" ? "0" : "320px";
}

nextSlide()

var slideInterval = setInterval(nextSlide,5000);
  
function nextSlide(){
  slides[currentSlide].classList.remove("showing");
  currentSlide = (currentSlide+1)%slides.length;
  slides[currentSlide].classList.add("showing");
  console.log("next slide");
}

function prevSlide(){
  if(currentSlide > 0){
  slides[currentSlide].classList.remove("showing");
  currentSlide = (currentSlide-1)%slides.length;
  slides[currentSlide].classList.add("showing");
  console.log("prev slide");
  }
  console.log("no previous slide")
}