const body = document.body;
let navbarH = document.querySelector(".navbar").offsetHeight;
const scrollUp = "scroll-up";
const scrollDown = "scroll-down";
let lastScroll = 0;

body.style.paddingTop = navbarH + "px"; 
window.addEventListener("scroll", () => {
  
  const currentScroll = window.pageYOffset;
  
  //if (currentScroll == 0) {
  if (currentScroll < 110) {
    body.classList.remove(scrollUp);
    return;
  }
   
  if (currentScroll > lastScroll && !body.classList.contains(scrollDown)) {
    // down
    body.classList.remove(scrollUp);
    body.classList.add(scrollDown);
    dropdownMinicart.classList.remove("show");
    HSC.classList.remove("active");
  } else if (currentScroll < lastScroll && body.classList.contains(scrollDown)) {
    // up
    body.classList.remove(scrollDown);
    body.classList.add(scrollUp);
  }
  lastScroll = currentScroll;
});

window.addEventListener("resize", () => {
  navbarH = document.querySelector(".navbar").offsetHeight;
  const mainMenu = document.querySelector("#main-menu").offsetHeight;
  if ( mainMenu > 190 ){
    navbarH = navbarH - mainMenu;
  }
  body.style.paddingTop = navbarH + "px"; 
  
});