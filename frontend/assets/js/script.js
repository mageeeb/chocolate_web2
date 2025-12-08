document.addEventListener("DOMContentLoaded", () => {
    lucide.createIcons();

    // Seuils pour déclencher différentes animations/effets
    const scrollThresholdSVG = 0;
    const scrollThresholdNavbar = 10;

    // Gestion du menu latéral
    const sideMenu = document.getElementById("side-menu");
    const menuOverlay = document.getElementById("menu-overlay");
    const menuBtn = document.getElementById("menu-burger-btn");
    const closeMenuBtn = document.getElementById("close-menu-btn");
    const menuLinks = sideMenu ? sideMenu.querySelectorAll("a") : [];

    const openMenu = () => {
        if (sideMenu && menuOverlay) {
            sideMenu.style.transform = "translate(0)";
            menuOverlay.style.opacity = "1";
            menuOverlay.style.pointerEvents = "auto";
            document.body.style.overflow = "hidden";
        }
    };

    const closeMenu = () => {
        if (sideMenu && menuOverlay) {
            sideMenu.style.transform = "translateX(100%)";
            menuOverlay.style.opacity = "0";
            document.body.style.overflow = "";
            setTimeout(() => {
                menuOverlay.style.pointerEvents = "none";
            }, 500);
        }
    };

    if (menuBtn) {
        menuBtn.addEventListener("click", openMenu);
    }
    if (closeMenuBtn) {
        closeMenuBtn.addEventListener("click", closeMenu);
    }
    if (menuOverlay) {
        menuOverlay.addEventListener("click", closeMenu);
    }
    menuLinks.forEach((link) => {
        link.addEventListener("click", closeMenu);
    });

    // Par défaut, retire la classe visible à la navbar-img
    const navbarImg = document.getElementById('navbar-img');
    const footerSection = document.getElementById('footer-section');

    if (navbarImg) {
        navbarImg.classList.remove("visible");
        navbarImg.style.display = "block"; // Toujours affichée pour la transition d'opacité
    }

    // Gestions scroll & Parallax
    window.addEventListener('scroll', () => {
        const scrollY = window.scrollY;

        if (scrollY > scrollThresholdSVG) {
            document.body.classList.add('animation-triggered');
        } else {
            document.body.classList.remove('animation-triggered');
        }


        // Affichage de la barre flottante navbar-img avec effet fade in/out via une classe
        if (navbarImg && footerSection) {
            const footerTop = footerSection.getBoundingClientRect().top;
            const windowHeight = window.innerHeight;

            if (footerTop < windowHeight) {
                navbarImg.classList.remove('visible');
            } else {
                if (scrollY > scrollThresholdNavbar) {
                    navbarImg.classList.add('visible');
                } else {
                    navbarImg.classList.remove('visible');
                }
            }
        }
    });
});

document.addEventListener('DOMContentLoaded', function () {
    const sections = Array.from(document.querySelectorAll('section[id]'));
    if (sections.length === 0) return;
    const navButtons = Array.from(document.querySelectorAll('#navbar-img button[data-section]'));

    function activateSection(sectionId) {
        navButtons.forEach(btn => {
            if (btn.dataset.section === sectionId) {
                btn.classList.add('bg-[#4d2c16]', 'text-white');
            } else {
                btn.classList.remove('bg-[#4d2c16]', 'text-white');
            }
        });
    }

    function onScroll() {
        let activeSection = sections[0].id;

        for (const section of sections) {
            const rect = section.getBoundingClientRect();
            if (rect.top <= 100 && rect.bottom >= 100) {
                activeSection = section.id;
                break;
            }
        }
        activateSection(activeSection);
    }

    window.addEventListener('scroll', onScroll, { passive: true });
    onScroll();
});


document.addEventListener("DOMContentLoaded", () => {
    // Gestion du carrousel
    // Desserts data
    const desserts = [
        {
            image: "../../frontend/assets/images/macaronsAuChocolat.jpg",
            title: "Macarons au chocolat",
        },
        {
            image: "../../frontend/assets/images/truffesAuChocolat.jpg",
            title: "Truffes au chocolat",
        },
        {
            image: "../../frontend/assets/images/gateauPralineChocolatNoisette.jpg",
            title: "Gâteau praliné chocolat noisette",
        },
        {
            image: "../../frontend/assets/images/brownieAuChocolat.jpg",
            title: "Brownie au chocolat",
        },
        {
            image: "../../frontend/assets/images/cookiesAuxPepitesDeChocolat.jpg",
            title: "Cookies aux pépites chocolat",
        },
        {
            image: "../../frontend/assets/images/coulantAuChocolat.jpg",
            title: "Coulant au chocolat",
        },
        {
            image: "../../frontend/assets/images/croissantAuChocolat.jpg",
            title: "Croissant au chocolat",
        },
        {
            image: "../../frontend/assets/images/fondantAuChocolat.jpg",
            title: "Fondant au chocolat",
        },
        {
            image: "../../frontend/assets/images/fraisesAuChocolat.jpg",
            title: "Fraises au chocolat",
        },
        {
            image: "../../frontend/assets/images/mousseAuChocolat.jpg",
            title: "Mousse au chocolat",
        },
        {
            image: "../../frontend/assets/images/souffleAuChocolat.jpg",
            title: "Soufflé au chocolat",
        },
        {
            image: "../../frontend/assets/images/tarteAuChocolat.jpg",
            title: "Tarte au chocolat",
        },
    ];

    // State
    let currentIndex = 0;
    let isAnimating = false;
    const visibleItems = 3;
    const totalItems = desserts.length;

    // Auto-play configuration
    let autoPlayInterval = null;
    const autoPlayDelay = 4000; // 4 seconds between slides
    let isAutoPlaying = true;

    // DOM Elements
    const carouselTrack = document.getElementById("carousel-track");
    if (!carouselTrack) return;
    const dotsContainer = document.getElementById("dots-container");
    const prevBtn = document.getElementById("prev-btn");
    const nextBtn = document.getElementById("next-btn");

    // Get visible items based on current index
    function getVisibleItems() {
        const visible = [];
        for (let i = 0; i < visibleItems; i++) {
            const index = (currentIndex + i) % totalItems;
            visible.push({ ...desserts[index], position: i });
        }
        return visible;
    }

    // Render carousel items
    function renderCarousel() {
        const items = getVisibleItems();
        carouselTrack.innerHTML = items
            .map(
                (item, idx) => `
        <div class="carousel-item position-${item.position} absolute w-full max-w-sm">
            <div class="dessert-card relative cursor-pointer">
                <img
                    src="${item.image}"
                    alt="${item.title}"
                    class="w-full h-[400px] object-cover"
                    loading="lazy"
                />
                <div class="overlay absolute inset-0 flex items-end justify-center p-8">
                    <h3 class="text-white text-2xl font-semibold text-center">
                        ${item.title}
                    </h3>
                </div>
            </div>
        </div>
    `,
            )
            .join("");
    }

    // Render dots
    function renderDots() {
        dotsContainer.innerHTML = desserts
            .map(
                (_, idx) => `
        <button
            class="dot h-2 rounded-full ${idx === currentIndex ? "active" : ""}"
            data-index="${idx}"
            aria-label="Go to slide ${idx + 1}"
        ></button>
    `,
            )
            .join("");

        // Add click handlers to dots
        document.querySelectorAll(".dot").forEach((dot) => {
            dot.addEventListener("click", (e) => {
                if (!isAnimating) {
                    const index = parseInt(e.target.dataset.index);
                    goToSlide(index);
                }
            });
        });
    }

    // Navigation functions
    function next() {
        if (isAnimating) return;
        isAnimating = true;
        currentIndex = (currentIndex + 1) % totalItems;
        updateCarousel();
    }

    function prev() {
        if (isAnimating) return;
        isAnimating = true;
        currentIndex = (currentIndex - 1 + totalItems) % totalItems;
        updateCarousel();
    }

    function goToSlide(index) {
        if (isAnimating) return;
        isAnimating = true;
        currentIndex = index;
        updateCarousel();
    }

    // Update carousel after navigation
    function updateCarousel() {
        prevBtn.disabled = true;
        nextBtn.disabled = true;

        renderCarousel();
        renderDots();

        setTimeout(() => {
            isAnimating = false;
            prevBtn.disabled = false;
            nextBtn.disabled = false;
        }, 500);
    }

    // Event listeners - removed duplicate listeners (moved to auto-play section)

    // Keyboard navigation
    document.addEventListener("keydown", (e) => {
        if (e.key === "ArrowLeft") {
            prev();
            restartAutoPlay();
        }
        if (e.key === "ArrowRight") {
            next();
            restartAutoPlay();
        }
    });

    // Touch/swipe support for mobile
    let touchStartX = 0;
    let touchEndX = 0;

    carouselTrack.addEventListener("touchstart", (e) => {
        touchStartX = e.changedTouches[0].screenX;
    });

    carouselTrack.addEventListener("touchend", (e) => {
        touchEndX = e.changedTouches[0].screenX;
        handleSwipe();
    });

    function handleSwipe() {
        const swipeThreshold = 50;
        const diff = touchStartX - touchEndX;

        if (Math.abs(diff) > swipeThreshold) {
            if (diff > 0) {
                next(); // Swipe left
                restartAutoPlay();
            } else {
                prev(); // Swipe right
                restartAutoPlay();
            }
        }
    }

    // Auto-play functions
    function startAutoPlay() {
        if (autoPlayInterval) return;
        isAutoPlaying = true;
        autoPlayInterval = setInterval(() => {
            next();
        }, autoPlayDelay);
    }

    function stopAutoPlay() {
        if (autoPlayInterval) {
            clearInterval(autoPlayInterval);
            autoPlayInterval = null;
            isAutoPlaying = false;
        }
    }

    function restartAutoPlay() {
        stopAutoPlay();
        startAutoPlay();
    }

    // Pause auto-play on hover
    carouselTrack.addEventListener("mouseenter", () => {
        if (isAutoPlaying) {
            stopAutoPlay();
        }
    });

    carouselTrack.addEventListener("mouseleave", () => {
        if (!isAutoPlaying) {
            startAutoPlay();
        }
    });

    // Restart auto-play after manual interaction
    prevBtn.addEventListener("click", () => {
        prev();
        restartAutoPlay();
    });

    nextBtn.addEventListener("click", () => {
        next();
        restartAutoPlay();
    });

    // Initialize carousel
    renderCarousel();
    renderDots();
    startAutoPlay();
});

//btn category
const categoryBtn = document.getElementById('category-btn');
if (categoryBtn) {
    categoryBtn.addEventListener('click', () => {
        window.location.href = '?pg=categories'; // Redirige vers la page category.html
    });
}
