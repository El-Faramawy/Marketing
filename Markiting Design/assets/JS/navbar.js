// NAV BAR
const box = document.getElementById('openMenue');
const nav = document.getElementById('navBar');

function viewMenue() {
    document.getElementById("navBar").classList.remove("hiden2");
    document.getElementById("navBar").classList.add("visible2");
}
function deleteMenue() {
    document.getElementById("navBar").classList.remove("visible2");
    document.getElementById("navBar").classList.add("hiden2");
}
box.onclick = function () {
    viewMenue()
}
document.getElementById("closeTheNav").onclick = function () {
    deleteMenue();
}
var navigationLinks = document.getElementsByClassName("nav-link");
for (var i = 0; i < navigationLinks.length; i++) {
    navigationLinks[i].onclick = function () {
        deleteMenue();
    }
}
document.addEventListener('click', function handleClickOutsideBox(event) {
    if (!box.contains(event.target) && !nav.contains(event.target)) {
      deleteMenue()
    }
});
$(function(){
    $('.selectpicker').selectpicker();
});