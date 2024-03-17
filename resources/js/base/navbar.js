import breakpoints from "../utils/breakpoints.js";
import { home } from "../utils/path.js";
import shapesChangeSize from "./shapes.js";

// Navbar
const navbar = document.body.querySelector("#navbar");
const navbarLogin = document.body.querySelector("#navbar-button-login");
const navbarMenu = document.body.querySelector("#navbar-menu");
const btnHumberger = document.body.querySelector("#button-humberger");
const humbergerClassList = [
    "absolute",
    "transition-all",
    "duration-300",
    "h-screen",
    "w-screen",
    "bg-white/40",
    "backdrop-blur-xl",
    "top-[80px]",
    "left-0",
    "px-8",
    "pt-4",
];

const scroll = () => navbarChangeBehaviour(navbar, navbarLogin);
const navbarChangeOnDown = (nav, navLogin) => {
    // Navbar
    nav.classList.add("backdrop-blur-lg", "drop-shadow-lg");
    nav.classList.replace("bg-transparent", "bg-white/40");

    // Button
    changeNavbarLoginToBlue(navLogin);
};
const navbarChangeOnUp = (nav, navLogin) => {
    // Navbar
    nav.classList.remove("backdrop-blur-lg", "drop-shadow-lg");
    nav.classList.replace("bg-white/40", "bg-transparent");

    // Button
    loginButtonChangeBehaviour(navLogin);
};
const navbarChangeBehaviour = (nav, navLogin) => {
    if (window.scrollY > 100) navbarChangeOnDown(nav, navLogin);
    else navbarChangeOnUp(nav, navLogin);
};
const changeNavbarLoginToBlue = (el, isBlue = true) => {
    if (isBlue) {
        el.classList.replace("lg:bg-white", "bg-dodger-blue");
        el.classList.replace("lg:text-midnight-blue", "text-white");
    } else {
        el.classList.replace("bg-dodger-blue", "lg:bg-white");
        el.classList.replace("text-white", "lg:text-midnight-blue");
    }
};
const loginButtonChangeBehaviour = (el) => {
    if (window.innerWidth <= breakpoints.xl || !home)
        changeNavbarLoginToBlue(el);
    else changeNavbarLoginToBlue(el, false);
};

const showList = () => {
    if (navbarMenu.classList.contains("opacity-0"))
        navbarMenu.classList.replace("opacity-0", "opacity-100");
    else navbarMenu.classList.replace("opacity-100", "opacity-0");
    navbarMenu.classList.add(...humbergerClassList, "block");
    navbarMenu.classList.toggle("hidden");
};

const closeList = () => {
    shapesChangeSize();

    if (window.innerWidth >= breakpoints.md) {
        if (navbarMenu.classList.contains("opacity-100"))
            navbarMenu.classList.replace("opacity-100", "opacity-0");
        navbarMenu.classList.remove(...humbergerClassList, "block");
        navbarMenu.classList.add("hidden");

        // Change its navbar behaviour
        navbarChangeBehaviour(navbar, navbarLogin);
    } else {
        changeNavbarLoginToBlue(navbarLogin);
    }
};

scroll();
if (home) shapesChangeSize();
window.onscroll = () => scroll();
window.onresize = () => closeList();
btnHumberger.addEventListener("click", showList);
