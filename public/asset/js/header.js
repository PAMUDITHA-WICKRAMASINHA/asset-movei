var scene = document.getElementById("scene");
var parallaxInstance = new Parallax(scene);

function toggleSidebar() {
    var sidebar = document.getElementById("sidebar");
    sidebar.style.width = sidebar.style.width === "320px" ? "0" : "320px";
}
