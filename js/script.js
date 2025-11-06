document.addEventListener('DOMContentLoaded', () => {
    lucide.createIcons();


    // Seuils pour déclencher différentes animations/effets
    const scrollThresholdSVG = 0;
    const scrollThresholdNavbar = 10; // ajuste cette valeur selon ton besoin

    // Effet Parallax
    const parallaxItems = document.querySelectorAll('[data-parallax-speed]');
    let initialPositions = [];
    parallaxItems.forEach(item => {
        initialPositions.push(item.getBoundingClientRect().top + window.scrollY);
    });

    // Gestion du menu latéral
    const sideMenu = document.getElementById('side-menu');
    const menuOverlay = document.getElementById('menu-overlay');
    const menuBtn = document.getElementById('menu-burger-btn');
    const closeMenuBtn = document.getElementById('close-menu-btn');
    const menuLinks = sideMenu ? sideMenu.querySelectorAll('a') : [];

    const openMenu = () => {
        if (sideMenu && menuOverlay) {
            sideMenu.style.transform = 'translate(0)';
            menuOverlay.style.opacity = '1';
            menuOverlay.style.pointerEvents = 'auto';
            document.body.style.overflow = 'hidden';
        }
    };

    const closeMenu = () => {
        if (sideMenu && menuOverlay) {
            sideMenu.style.transform = 'translateX(100%)';
            menuOverlay.style.opacity = '0';
            document.body.style.overflow = '';
            setTimeout(() => {
                menuOverlay.style.pointerEvents = 'none';
            }, 500);
        }
    };

    if (menuBtn) {
        menuBtn.addEventListener('click', openMenu);
    }
    if (closeMenuBtn) {
        closeMenuBtn.addEventListener('click', closeMenu);
    }
    if (menuOverlay) {
        menuOverlay.addEventListener('click', closeMenu);
    }
    menuLinks.forEach(link => {
        link.addEventListener('click', closeMenu);
    });

    // Par défaut, retire la classe visible à la navbar-img
    const navbarImg = document.getElementById('navbar-img');
    if (navbarImg) {
        navbarImg.classList.remove('visible');
        navbarImg.style.display = 'block'; // Toujours affichée pour la transition d'opacité
    }

    // Gestions scroll & Parallax
    window.addEventListener('scroll', () => {
        const scrollY = window.scrollY;

        // Animation déclenchée par le scroll (SVG + classe body + séparateur)
        if (scrollY > scrollThresholdSVG) {
            document.body.classList.add('animation-triggered');
            const separator = document.querySelector('#separator-lines');
            if (separator) separator.style.opacity = 0;
        } else {
            document.body.classList.remove('animation-triggered');
            const separator = document.querySelector('#separator-lines');
            if (separator) {
                setTimeout(() => {
                    separator.style.opacity = 1;
                }, 1000);
            }
        }

        // Affichage de la barre flottante navbar-img avec effet fade in/out via une classe
        if (navbarImg) {
            if (scrollY > scrollThresholdNavbar) {
                navbarImg.classList.add('visible');
            } else {
                navbarImg.classList.remove('visible');
            }
        }

        // Parallax
        parallaxItems.forEach((item, index) => {
            const speed = parseFloat(item.getAttribute('data-parallax-speed')) || 1.0;
            if (scrollY > scrollThresholdNavbar) {
                const translateY = (scrollY - scrollThresholdNavbar) * (1 - speed);
                item.style.transform = `translateY(${translateY}px) translateZ(0)`;
            } else {
                item.style.transform = 'none';
            }
        });
    });
});

document.addEventListener('DOMContentLoaded', () => {
    // Gestion du carrousel
    const carousel = document.getElementById('carousel');
    const prevBtn = document.getElementById('prev-btn');
    const nextBtn = document.getElementById('next-btn');

    if (carousel) {
        let isScrolling = false;
        let autoScrollInterval;

        const scrollNext = () => {
            if (!isScrolling) {
                isScrolling = true;
                carousel.scrollBy({ left: carousel.clientWidth, behavior: 'smooth' });
                setTimeout(() => { isScrolling = false; }, 3000);
            }
        };

        const startAutoScroll = () => {
            autoScrollInterval = setInterval(scrollNext, 3000);
        };

        const stopAutoScroll = () => {
            clearInterval(autoScrollInterval);
        };

        // Démarrer le défilement automatique
        startAutoScroll();

        // Arrêter/redémarrer le défilement automatique au survol
        carousel.addEventListener('mouseenter', stopAutoScroll);
        carousel.addEventListener('mouseleave', startAutoScroll);

        // Gestion des boutons Précédent/Suivant
        if (prevBtn && nextBtn) {
            prevBtn.addEventListener('click', () => {
                stopAutoScroll();
                carousel.scrollBy({ left: -carousel.clientWidth, behavior: 'smooth' });
                setTimeout(startAutoScroll, 5000);
            });

            nextBtn.addEventListener('click', () => {
                stopAutoScroll();
                carousel.scrollBy({ left: carousel.clientWidth, behavior: 'smooth' });
                setTimeout(startAutoScroll, 5000);
            });
        }

        // Détection du défilement tactile
        let startX;
        carousel.addEventListener('touchstart', (e) => {
            stopAutoScroll();
            startX = e.touches[0].clientX;
        });

        carousel.addEventListener('touchmove', (e) => {
            if (!startX) return;
            const x = e.touches[0].clientX;
            const diff = startX - x;
            carousel.scrollBy({ left: diff, behavior: 'smooth' });
            startX = x;
        });

        carousel.addEventListener('touchend', () => {
            setTimeout(startAutoScroll, 5000);
        });
    }
});
