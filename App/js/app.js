const navUl = document.querySelector(".nav-ul");
const panel = document.querySelector(".nav-panel");
let dropMenu = document.querySelectorAll(".drop-menu");
panel.addEventListener("click", ()=>{
  navUl.classList.toggle("nav-ul-toggle");
  dropMenu[0].classList.toggle("drop-menu-toggle");
  dropMenu[1].classList.toggle("drop-menu-toggle");
})
dropMenu[1].addEventListener("click", ()=>{window.location.href="index.html?logout='1'"})
