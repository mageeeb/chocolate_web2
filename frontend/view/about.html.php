<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>À propos | Chocolat Hub — Artisanat chocolatier</title>
    <meta
        name="description"
        content="Découvrez l'histoire de Chocolat Hub. Nous confectionnons des chocolats artisanaux à partir de fèves issues de sources éthiques, célébrant la tradition et l'innovation à chaque bouchée."
    />

    <!-- Tailwind CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600&family=Playfair+Display:ital,wght@0,400;0,700;1,400&display=swap"
        rel="stylesheet"
    />

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        display: ["Playfair Display", "Georgia", "serif"],
                        body: ["DM Sans", "system-ui", "sans-serif"],
                    },
                    colors: {
                        background: "hsl(30, 25%, 97%)",
                        foreground: "hsl(20, 25%, 15%)",
                        card: "hsl(30, 20%, 95%)",
                        muted: {
                            DEFAULT: "hsl(30, 15%, 90%)",
                            foreground: "hsl(20, 10%, 45%)",
                        },
                        border: "hsl(30, 20%, 88%)",
                        primary: "hsl(20, 45%, 25%)",
                        accent: "hsl(350, 35%, 75%)",
                        chocolate: {
                            DEFAULT: "hsl(20, 45%, 25%)",
                            light: "hsl(20, 30%, 40%)",
                        },
                        rose: {
                            DEFAULT: "hsl(350, 35%, 75%)",
                            light: "hsl(350, 40%, 90%)",
                        },
                    },
                    keyframes: {
                        "fade-in": {
                            from: { opacity: "0", transform: "translateY(20px)" },
                            to: { opacity: "1", transform: "translateY(0)" },
                        },
                        float: {
                            "0%, 100%": { transform: "translateY(0)" },
                            "50%": { transform: "translateY(-10px)" },
                        },
                    },
                    animation: {
                        "fade-in": "fade-in 0.8s ease-out forwards",
                        float: "float 6s ease-in-out infinite",
                    },
                },
            },
        };
    </script>

    <style>
        body {
            font-family: "DM Sans", system-ui, sans-serif;
            background-color: hsl(30, 25%, 97%);
            color: hsl(20, 25%, 15%);
            -webkit-font-smoothing: antialiased;
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            font-family: "Playfair Display", Georgia, serif;
        }

        .animate-fade-in {
            opacity: 0;
            animation: fade-in 0.8s ease-out forwards;
        }

        .animate-float {
            animation: float 6s ease-in-out infinite;
        }

        @keyframes fade-in {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes float {
            0%,
            100% {
                transform: translateY(0);
            }
            50% {
                transform: translateY(-10px);
            }
        }
    </style>
</head>
<body class="min-h-screen bg-[#f7efe6]">
    <!-- Navbar -->
    <?php include "../../frontend/view/components/_menu.html.php"; ?>

<!-- Hero Section -->
<section class="relative overflow-hidden">
    <!-- Decorative background elements -->
    <div class="absolute inset-0 overflow-hidden pointer-events-none">
        <div
            class="absolute top-20 left-10 w-2 h-2 rounded-full bg-rose/40 animate-float"
            style="animation-delay: 0s"
        ></div>
        <div
            class="absolute top-40 right-20 w-3 h-3 rounded-full bg-accent/30 animate-float"
            style="animation-delay: 1s"
        ></div>
        <div
            class="absolute top-60 left-1/4 w-1.5 h-1.5 rounded-full bg-chocolate-light/30 animate-float"
            style="animation-delay: 2s"
        ></div>
        <div
            class="absolute bottom-40 right-1/3 w-2 h-2 rounded-full bg-rose/30 animate-float"
            style="animation-delay: 3s"
        ></div>
    </div>

    <div class="container mx-auto px-6 pt-16 pb-8">
        <!-- Brand Name -->
        <header
            class="text-center mb-16 animate-fade-in"
            style="animation-delay: 0.1s"
        >
            <h1
                class="font-display italic text-4xl md:text-5xl text-primary tracking-wide"
            >
                Chocolat Hub
            </h1>
        </header>

        <!-- Main Heading -->
        <div
            class="text-center max-w-3xl mx-auto mb-12 animate-fade-in"
            style="animation-delay: 0.3s"
        >
            <h2
                class="font-display text-4xl md:text-5xl lg:text-6xl text-foreground mb-6 leading-tight"
            >
                Confectionné avec passion
            </h2>
            <p
                class="text-muted-foreground text-lg md:text-xl leading-relaxed max-w-2xl mx-auto"
            >
                Nous croyons que chaque morceau de chocolat raconte une histoire. De
                la fève à la tablette, nous créons des chocolats artisanaux qui
                célèbrent la tradition tout en embrassant l'innovation.
            </p>
        </div>

        <!-- Illustration -->
        <div
            class="flex justify-center mb-16 animate-fade-in"
            style="animation-delay: 0.5s"
        >
            <img
                src="../../frontend/assets/images/chocolat-draw-removed.png"
                alt="Illustration dessinée à la main de chocolats artisanaux, truffes, fèves de cacao et une tasse de chocolat chaud"
                class="w-full max-w-2xl h-auto"
            />
        </div>
    </div>
</section>

<!-- Divider -->
<div class="border-t border-border"></div>

<!-- About Section -->
<section class="py-20" style="background-color: hsla(30, 20%, 95%, 0.5)">
    <div class="container mx-auto px-6">
        <h3
            class="font-display text-3xl md:text-4xl text-center text-foreground mb-12 animate-fade-in"
            style="animation-delay: 0.7s"
        >
            Notre histoire
        </h3>

        <div
            class="grid md:grid-cols-2 gap-12 max-w-5xl mx-auto animate-fade-in"
            style="animation-delay: 0.9s"
        >
            <div class="space-y-6">
                <p class="text-muted-foreground leading-relaxed">
                    Fondé au cœur d'un petit village européen, Chocolat Hub a vu le
                    jour comme une humble expérience en cuisine. Ce qui a commencé
                    comme une passion pour la truffe parfaite s'est transformé en une
                    célébration de l'art chocolatier.
                </p>
                <p class="text-muted-foreground leading-relaxed">
                    Nous sélectionnons nos fèves de cacao directement auprès de
                    plantations durables au Ghana, en Équateur et à Madagascar,
                    garantissant non seulement des saveurs exceptionnelles mais aussi
                    des pratiques éthiques qui soutiennent les communautés agricoles à
                    travers le monde.
                </p>
            </div>

            <div class="space-y-6">
                <p class="text-muted-foreground leading-relaxed">
                    Chaque chocolat que nous créons est confectionné à la main en
                    petites séries, ce qui nous permet de maintenir une qualité
                    optimale tout en expérimentant des combinaisons de saveurs uniques
                    — des ganaches classiques aux infusions innovantes avec des herbes
                    et épices locales.
                </p>
                <p class="text-muted-foreground leading-relaxed">
                    Chez Chocolat Hub, nous sommes plus que des chocolatiers — nous
                    sommes des conteurs, tissant des récits de terres lointaines et de
                    traditions chéries dans chaque bouchée. Rejoignez-nous dans ce
                    délicieux voyage.
                </p>
            </div>
        </div>

        <!-- Values -->
        <div
            class="mt-20 grid sm:grid-cols-3 gap-8 max-w-4xl mx-auto animate-fade-in"
            style="animation-delay: 1.1s"
        >
            <div class="text-center">
                <div
                    class="w-12 h-12 mx-auto mb-4 rounded-full bg-rose-light flex items-center justify-center"
                >
                    <span class="text-chocolate text-xl">✦</span>
                </div>
                <h4 class="font-display text-lg text-foreground mb-2">
                    Qualité artisanale
                </h4>
                <p class="text-muted-foreground text-sm">
                    Production en petites séries pour un goût exceptionnel
                </p>
            </div>

            <div class="text-center">
                <div
                    class="w-12 h-12 mx-auto mb-4 rounded-full bg-rose-light flex items-center justify-center"
                >
                    <span class="text-chocolate text-xl">♦</span>
                </div>
                <h4 class="font-display text-lg text-foreground mb-2">
                    Approvisionnement durable
                </h4>
                <p class="text-muted-foreground text-sm">
                    Fèves issues de sources éthiques à travers le monde
                </p>
            </div>

            <div class="text-center">
                <div
                    class="w-12 h-12 mx-auto mb-4 rounded-full bg-rose-light flex items-center justify-center"
                >
                    <span class="text-chocolate text-xl">❖</span>
                </div>
                <h4 class="font-display text-lg text-foreground mb-2">
                    Ingrédients purs
                </h4>
                <p class="text-muted-foreground text-sm">
                    Sans arômes artificiels ni conservateurs
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Footer -->
<?php include "../../frontend/view/components/_footer.html.php"; ?>
    <script src="../../frontend/assets/js/script.js"></script>
</body>
</html>
