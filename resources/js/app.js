import "./bootstrap";

import Alpine from "alpinejs";
import collapse from "@alpinejs/collapse";
import PerfectScrollbar from "perfect-scrollbar";

window.PerfectScrollbar = PerfectScrollbar;

document.addEventListener("alpine:init", () => {
    Alpine.data("mainState", () => {
        let lastScrollTop = 0;
        const init = function () {
            window.addEventListener("scroll", () => {
                let st =
                    window.pageYOffset || document.documentElement.scrollTop;
                if (st > lastScrollTop) {
                    // downscroll
                    this.scrollingDown = true;
                    this.scrollingUp = false;
                } else {
                    // upscroll
                    this.scrollingDown = false;
                    this.scrollingUp = true;
                    if (st == 0) {
                        //  reset
                        this.scrollingDown = false;
                        this.scrollingUp = false;
                    }
                }
                lastScrollTop = st <= 0 ? 0 : st; // For Mobile or negative scrolling
            });
        };

        const getTheme = () => {
            if (window.localStorage.getItem("dark")) {
                return JSON.parse(window.localStorage.getItem("dark"));
            }
            return (
                !!window.matchMedia &&
                window.matchMedia("(prefers-color-scheme: dark)").matches
            );
        };
        const setTheme = (value) => {
            window.localStorage.setItem("dark", value);
        };
        return {
            init,
            isDarkMode: getTheme(),
            toggleTheme() {
                this.isDarkMode = !this.isDarkMode;
                setTheme(this.isDarkMode);
            },
            isSidebarOpen: window.innerWidth > 1024,
            isSidebarHovered: false,
            handleSidebarHover(value) {
                if (window.innerWidth < 1024) {
                    return;
                }
                this.isSidebarHovered = value;
            },
            handleWindowResize() {
                if (window.innerWidth <= 1024) {
                    this.isSidebarOpen = false;
                } else {
                    this.isSidebarOpen = true;
                }
            },
            scrollingDown: false,
            scrollingUp: false,
        };
    });
});

document.addEventListener("DOMContentLoaded", function () {
    const links = document.querySelectorAll(".tab-link");
    const contents = document.querySelectorAll(".tab-content");

    links.forEach((link) => {
        link.addEventListener("click", function (e) {
            e.preventDefault();

            const target = this.getAttribute("data-tab");

            // Sembunyikan semua tab
            contents.forEach((c) => c.classList.add("hidden"));

            // Tampilkan tab yang dipilih
            document.getElementById(target).classList.remove("hidden");

            // Aktifkan styling tab yang diklik (opsional)
            links.forEach((l) =>
                l.classList.remove("text-blue-600", "border-blue-600")
            );
            this.classList.add("text-blue-600", "border-blue-600");
        });
    });
});

// const navDialog = document.getElementById("nav-dialog");

// function handleMenu() {
//     navDialog.classList.toggle("hidden");
// }

// // Scroll Apps Start
// const initialTranslateLTR = -48 * 4;
// const initialTranslateRTL = 36 * 4;

// function setupIntersectionObeserver(element, isLTR, speed) {
//     const intersectionCallback = (entries) => {
//         const isIntersecting = entries[0].isIntersecting;
//         if (isIntersecting) {
//             document.addEventListener("scroll", scrollHandler);
//         } else {
//             document.removeEventListener("scroll", scrollHandler);
//         }
//     };
//     const intersectionObserver = new IntersectionObserver(intersectionCallback);

//     intersectionObserver.observe(element);

//     function scrollHandler() {
//         const translateX =
//             (window.innerHeight - element.getBoundingClientRect().top) * speed;

//         let totalTranslate = 0;
//         if (isLTR) {
//             totalTranslate = translateX + initialTranslateLTR;
//         } else {
//             totalTranslate = -(translateX + initialTranslateRTL);
//         }
//         element.style.transform = `translateX(${totalTranslate}px)`;
//     }
// }

// const line1 = document.getElementById("line1");
// const line2 = document.getElementById("line2");
// const line3 = document.getElementById("line3");

// setupIntersectionObeserver(line1, true, 0.15);
// setupIntersectionObeserver(line2, false, 0.15);
// setupIntersectionObeserver(line3, true, 0.15);

// document.addEventListener("DOMContentLoaded", function () {
//     // Ambil semua elemen dt
//     const toggles = document.querySelectorAll(".group dt");

//     toggles.forEach(function (toggle) {
//         toggle.addEventListener("click", function () {
//             const group = toggle.closest(".group");
//             const dd = group.querySelector("dd");
//             const icon = toggle.querySelector("i");

//             // Toggle class hidden untuk menampilkan/menyembunyikan dd
//             dd.classList.toggle("hidden");

//             // Toggle rotasi ikon
//             icon.classList.toggle("-rotate-180");
//             icon.classList.toggle("rotate-0"); // pastikan class ini disiapkan di CSS
//         });
//     });
// });

Alpine.plugin(collapse);

Alpine.start();
