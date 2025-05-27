const navDialog = document.getElementById("nav-dialog");

function handleMenu() {
    navDialog.classList.toggle("hidden");
}

// Scroll Apps Start
const initialTranslateLTR = -48 * 4;
const initialTranslateRTL = 36 * 4;

function setupIntersectionObeserver(element, isLTR, speed) {
    const intersectionCallback = (entries) => {
        const isIntersecting = entries[0].isIntersecting;
        if (isIntersecting) {
            document.addEventListener("scroll", scrollHandler);
        } else {
            document.removeEventListener("scroll", scrollHandler);
        }
    };
    const intersectionObserver = new IntersectionObserver(intersectionCallback);

    intersectionObserver.observe(element);

    function scrollHandler() {
        const translateX =
            (window.innerHeight - element.getBoundingClientRect().top) * speed;

        let totalTranslate = 0;
        if (isLTR) {
            totalTranslate = translateX + initialTranslateLTR;
        } else {
            totalTranslate = -(translateX + initialTranslateRTL);
        }
        element.style.transform = `translateX(${totalTranslate}px)`;
    }
}

const line1 = document.getElementById("line1");
const line2 = document.getElementById("line2");
const line3 = document.getElementById("line3");

setupIntersectionObeserver(line1, true, 0.15);
setupIntersectionObeserver(line2, false, 0.15);
setupIntersectionObeserver(line3, true, 0.15);

// Scroll Apps End

// Faq Start

// const dtElements = document.querySelectorAll("dt");
// dtElements.forEach((element) => {
//     element.addEventListener("click", () => {
//         const ddId = element.getAttribute("aria-controls");
//         const ddElement = document.getElementById(ddId);
//         const ddArrowIcon = element.querySelectorAll("i")[0];

//         ddElement.classList.toggle("hidden");
//         ddArrowIcon.classList.toggle("-rotate-180");
//     });
// });

document.addEventListener("DOMContentLoaded", function () {
    // Ambil semua elemen dt
    const toggles = document.querySelectorAll(".group dt");

    toggles.forEach(function (toggle) {
        toggle.addEventListener("click", function () {
            const group = toggle.closest(".group");
            const dd = group.querySelector("dd");
            const icon = toggle.querySelector("i");

            // Toggle class hidden untuk menampilkan/menyembunyikan dd
            dd.classList.toggle("hidden");

            // Toggle rotasi ikon
            icon.classList.toggle("-rotate-180");
            icon.classList.toggle("rotate-0"); // pastikan class ini disiapkan di CSS
        });
    });
});

// Faq End
