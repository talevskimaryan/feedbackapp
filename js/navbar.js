//Disable scrolling function - NOT USED
function disableScrolling() {
    var x = window.scrollX;
    var y = window.scrollY;
    window.onscroll = function() {
        window.scrollTo(x, y);
    };
}

function enableScrolling() {
    window.onscroll = function() {};
}

//Mobile menu function
const menuBtn = document.querySelector(".burger-menu");
const mobileMenu = document.querySelector(".mobile-menu");
const backgroundCover = document.querySelector(".background-cover");
const bodyObject = document.body;
menuOpen = 0;

function burgerMenu() {
    if (menuOpen == 0) {
        menuBtn.classList.add("menu-open");
        mobileMenu.classList.add("shown");
        backgroundCover.classList.add("shown");
        bodyObject.classList.add("hidden-scroll");
        menuOpen = 1;
        disableScrolling();
    } else {
        menuBtn.classList.remove("menu-open");
        mobileMenu.classList.remove("shown");
        backgroundCover.classList.remove("shown");
        bodyObject.classList.remove("hidden-scroll");
        menuOpen = 0;
        enableScrolling();
    }
}

const navBar = document.getElementById('navigation')
const logo = document.getElementById('logo')

//Detect scrolling and shrink navbar
window.onscroll = function() {
    scrollFunction()
};

function scrollFunction() {
    if (document.body.scrollTop > 80 || document.documentElement.scrollTop > 80) {
        navBar.classList.add("shrink-bar");
        logo.classList.add("resize-logo");
    } else {
        navBar.classList.remove("shrink-bar");
        logo.classList.remove("resize-logo");
    }
}