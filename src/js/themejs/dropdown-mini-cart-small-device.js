const dropdownMinicart = document.getElementById('dropdownMenuMiniCart');
const miniCartWrapper = document.querySelector('.mini-cart-wrapper');
let navbarH = document.querySelector(".navbar").offsetHeight;
let coords = miniCartWrapper.getBoundingClientRect();


if (window.screen.width < 576) {
    dropdownMinicart.style.left = '-'+coords.left+'px';
    dropdownMinicart.style.width = '100vw';
    dropdownMinicart.style.marginTop = ((navbarH - coords.bottom)-2)+"px";
} 
window.addEventListener("resize", () => {
    if (window.screen.width < 576) {
        coords = miniCartWrapper.getBoundingClientRect();
        dropdownMinicart.style.left = '-'+coords.left+'px';
        dropdownMinicart.style.width = '100vw';
       dropdownMinicart.style.marginTop = ((navbarH - coords.bottom)-2)+"px";

    } else {
        dropdownMinicart.style.left = 'auto';
        dropdownMinicart.style.width = '300px';
        dropdownMinicart.style.marginTop = '0px'
    }
    
});
