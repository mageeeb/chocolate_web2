<!doctype html>
<html lang="fr">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Chocolat Hub - Toutes les Recettes</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="../../frontend/assets/css/style.css" />
    <link rel="icon" href="../../frontend/assets/images/tablette_chocolat1.ico" type="image/png" />
    <script src="https://unpkg.com/lucide@latest"></script>

    <style>
        .modal-enter {
            opacity: 0;
            transform: scale(0.95);
        }

        .modal-enter-active {
            opacity: 1;
            transform: scale(1);
            transition: all 0.3s ease-out;
        }

        .modal-exit {
            opacity: 1;
            transform: scale(1);
        }

        .modal-exit-active {
            opacity: 0;
            transform: scale(0.95);
            transition: all 0.2s ease-in;
        }

        body {
            background-color: #f7efe6;
            color: #4d2c16;
        }

        .modal-inner {
            max-height: 90vh;
        }

        .modal-left .img-wrap {
            height: 220px;
            overflow: hidden;
        }

        .modal-left .img-wrap img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
        }

        @media (min-width: 768px) {
            .modal-left {
                flex: 0 0 50%;
            }

            .modal-left .img-wrap {
                position: sticky;
                top: 0;
                height: 90vh;
                overflow: hidden;
            }

            .modal-right {
                flex: 1 1 50%;
                overflow-y: auto;
                max-height: 90vh;
            }
        }
    </style>
</head>

<body class="overflow-x-hidden min-h-screen relative">
    <!-- NAVBAR FLOTANTE -->
    <?php include "../../frontend/view/components/_menu.html.php"; ?>

    <header class="pt-20 pb-10 px-6 text-center">
        <h1 class="text-5xl md:text-7xl font-medium text-[#7a3c18] mb-4">L'Atelier Recettes</h1>
        <p class="text-xl opacity-80 max-w-2xl mx-auto">
            Explorez notre collection complète. Filtrez par catégorie et laissez-vous tenter.
        </p>
    </header>

    <section class="px-6 mb-10">
        <div class="flex flex-wrap justify-center gap-4" id="filter-container">
            <button onclick="filterRecipes('all')"
                class="filter-btn active bg-[#4d2c16] text-[#f7efe6] px-6 py-2 rounded-full font-medium transition hover:shadow-lg ring-2 ring-offset-2 ring-[#4d2c16]">Tout</button>
            <button onclick="filterRecipes('gateau')"
                class="filter-btn bg-white text-[#4d2c16] px-6 py-2 rounded-full font-medium transition hover:bg-[#fbe7cd] hover:shadow-lg">Gâteaux</button>
            <button onclick="filterRecipes('mousse')"
                class="filter-btn bg-white text-[#4d2c16] px-6 py-2 rounded-full font-medium transition hover:bg-[#fbe7cd] hover:shadow-lg">Mousses</button>
            <button onclick="filterRecipes('boisson')"
                class="filter-btn bg-white text-[#4d2c16] px-6 py-2 rounded-full font-medium transition hover:bg-[#fbe7cd] hover:shadow-lg">Boissons</button>
            <button onclick="filterRecipes('glace')"
                class="filter-btn bg-white text-[#4d2c16] px-6 py-2 rounded-full font-medium transition hover:bg-[#fbe7cd] hover:shadow-lg">Glacé</button>
        </div>
    </section>

    <section class="px-6 md:px-20 pb-32">
        <div id="recipes-grid" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        </div>
    </section>


    <div id="recipe-modal" class="fixed inset-0 z-50 hidden flex items-center justify-center p-4">
        <div class="absolute inset-0 bg-[#2d1b14]/60 backdrop-blur-sm" onclick="closeModal()"></div>

        <div
            class="bg-[#f7efe6] w-full max-w-4xl rounded-3xl shadow-2xl relative z-10 flex flex-col md:flex-row modal-inner overflow-hidden">
            <button onclick="closeModal()"
                class="absolute top-4 right-4 bg-white/70 p-2 rounded-full hover:bg-white transition z-20">
                <i data-lucide="x" class="w-6 h-6 text-[#4d2c16]"></i>
            </button>

            <div class="w-full md:w-1/2 modal-left">
                <div class="img-wrap">
                    <img id="modal-img" src="" alt="Recipe" class="w-full h-full object-cover" />
                </div>
            </div>

            <div class="w-full md:w-1/2 modal-right p-8 md:p-12 text-[#4d2c16] overflow-y-auto">
                <span id="modal-tag"
                    class="text-xs font-bold uppercase tracking-wider text-[#d4a15a] mb-2 block"></span>
                <h2 id="modal-title" class="text-3xl md:text-4xl font-serif font-bold mb-4 text-[#7a3c18]"></h2>

                <div class="flex gap-6 text-sm mb-6 border-y border-[#4d2c16]/10 py-4">
                    <div class="flex items-center gap-2">
                        <i data-lucide="clock" class="w-4 h-4"></i>
                        <span id="modal-time"></span>
                    </div>
                    <div class="flex items-center gap-2">
                        <i data-lucide="users" class="w-4 h-4"></i>
                        <span id="modal-servings"></span>
                    </div>
                    <div class="flex items-center gap-2">
                        <i data-lucide="bar-chart" class="w-4 h-4"></i>
                        <span id="modal-level"></span>
                    </div>
                    <div class="flex items-center gap-2">
                        <i data-lucide="star" class="w-4 h-4 fill-[#d4a15a] text-[#d4a15a]"></i>
                        <span id="modal-rating" class="font-bold text-[#d4a15a]"></span>
                    </div>
                </div>

                <div class="mb-6">
                    <h3 class="font-bold text-lg mb-2 flex items-center gap-2">
                        <i data-lucide="shopping-basket" class="w-4 h-4"></i> Ingrédients
                    </h3>
                    <ul id="modal-ingredients"
                        class="list-disc list-inside space-y-1 text-sm opacity-90 marker:text-[#d4a15a]">
                    </ul>
                </div>

                <div class="mb-8">
                    <h3 class="font-bold text-lg mb-2 flex items-center gap-2">
                        <i data-lucide="chef-hat" class="w-4 h-4"></i> Description
                    </h3>
                    <p id="modal-desc" class="text-sm leading-relaxed opacity-90 whitespace-pre-line"></p>
                </div>


                <div class="flex justify-center mt-8">
                    <a id="modal-external-link" href="#"
                        class="hidden px-8 py-4 rounded-xl bg-[#7a3c18] text-white font-bold text-lg hover:bg-[#9c4f23] transition-all shadow-xl">
                        Voir la recette complète
                    </a>
                </div>
            </div>
        </div>
    </div>


    <!-- Footer -->
    <footer id="footer-section" class="relative z-1000">
        <div class="bg-[#f7efe6] text-white relative h-full">
            <div class="container px-[80px]">
                <div class="flex justify-between items-center">
                    <div class="flex flex-col justify-between gap-20 my-[400px] sm:flex-col md:flex-row lg:flex-row">
                        <div>
                            <h2 class="text-3xl mb-2 text-[#7a3c18]">Follow us</h2>
                            <div class="flex gap-3 relative z-10">
                                <a href="https://www.instagram.com/cf2m_bruxelles/" target="_blank">
                                    <svg width="24px" height="24px" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M16.19 2H7.81C4.17 2 2 4.17 2 7.81V16.18C2 19.83 4.17 22 7.81 22H16.18C19.82 22 21.99 19.83 21.99 16.19V7.81C22 4.17 19.83 2 16.19 2ZM12 15.88C9.86 15.88 8.12 14.14 8.12 12C8.12 9.86 9.86 8.12 12 8.12C14.14 8.12 15.88 9.86 15.88 12C15.88 14.14 14.14 15.88 12 15.88ZM17.92 6.88C17.87 7 17.8 7.11 17.71 7.21C17.61 7.3 17.5 7.37 17.38 7.42C17.26 7.47 17.13 7.5 17 7.5C16.73 7.5 16.48 7.4 16.29 7.21C16.2 7.11 16.13 7 16.08 6.88C16.03 6.76 16 6.63 16 6.5C16 6.37 16.03 6.24 16.08 6.12C16.13 5.99 16.2 5.89 16.29 5.79C16.52 5.56 16.87 5.45 17.19 5.52C17.26 5.53 17.32 5.55 17.38 5.58C17.44 5.6 17.5 5.63 17.56 5.67C17.61 5.7 17.66 5.75 17.71 5.79C17.8 5.89 17.87 5.99 17.92 6.12C17.97 6.24 18 6.37 18 6.5C18 6.63 17.97 6.76 17.92 6.88Z"
                                            fill="#3D1F0D" />
                                    </svg>
                                </a>
                                <a href="https://www.facebook.com/centredeformation2mille/?locale=fr_FR"
                                    target="_blank">
                                    <svg width="24px" height="24px" viewBox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <rect x="0" fill="none" width="20" height="20" />

                                        <g>
                                            <path
                                                d="M2.89 2h14.23c.49 0 .88.39.88.88v14.24c0 .48-.39.88-.88.88h-4.08v-6.2h2.08l.31-2.41h-2.39V7.85c0-.7.2-1.18 1.2-1.18h1.28V4.51c-.22-.03-.98-.09-1.86-.09-1.85 0-3.11 1.12-3.11 3.19v1.78H8.46v2.41h2.09V18H2.89c-.49 0-.89-.4-.89-.88V2.88c0-.49.4-.88.89-.88z"
                                                fill="#3D1F0D" />
                                        </g>
                                    </svg>
                                </a>
                            </div>
                        </div>
                        <div>
                            <h2 class="text-3xl mb-4 text-[#7a3c18]">Pages</h2>
                            <div class="text-[#3D1F0D]">
                                <a class="block" href="../../index.html">Home</a>
                                <a class="block" href="../../category.html">Recipies</a>
                                <a class="block" href="/">About</a>
                            </div>
                        </div>
                        <div>
                            <h2 class="text-3xl mb-4 text-[#7a3c18]">Info</h2>
                            <div class="text-[#3D1F0D]">
                                <a class="block" target="_blank"
                                    href="https://www.google.com/maps/place/Centre+de+Formation+2mille/@50.8255085,4.3361576,17z/data=!3m1!4b1!4m6!3m5!1s0x47c3c4424e23846d:0x96f406ef5208ebd9!8m2!3d50.8255051!4d4.3387325!16s%2Fg%2F1tj20q1k?entry=ttu&g_ep=EgoyMDI1MTAyOS4yIKXMDSoASAFQAw%3D%3D ">Adresse
                                    : Av. du Parc 89, 1060 Bruxelles</a>
                                <a class="block" href="mailto:centredeformationCF2M@gmail.com">Email :
                                    centredeformationCF2M@gmail.com</a>
                                <a class="block" href="tel:+32025390360">Tel : +32 02.53.90.36.0</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="vague-pic absolute bottom-0 right-0">
                <img src="../../frontend/assets/images/vague-choco.png" class="" alt="" />
            </div>
            <div class="absolute bottom-0 left-0 p-4">
                <ul class="flex space-x-4 text-[10px]">
                    <li>© 2025 Chocolat Hub, LLC, All Rights Reserved.</li>
                    <li>Terms & Conditions</li>
                    <li>Privacy Policy</li>
                </ul>
            </div>
            <div class="absolute bottom-10 text-[12px] right-0 p-4 lg:text-[14px] lg:bottom-0 sm:text-[12px]">
                <ul class="flex space-x-4">
                    <li>J-M</li>
                    <li>Danni</li>
                    <li>
                        <a href="https://solakabuta.com" target="_blank" class="hover:text-[#44AF69]">Sola</a>
                    </li>
                    <li>
                        <a href="https://portfolio-sam-beige.vercel.app/" target="_blank"
                            class="hover:text-[#9C89B8]">Samuel</a>
                    </li>
                    <li>
                        <a href="https://portfolio-phi-tan-oixshqdcmr.vercel.app/" target="_blank"
                            class="hover:text-[#4464AD]">Reda</a>
                    </li>
                    <li>Mykyta</li>
                </ul>
            </div>
        </div>
    </footer>

    <script>
        lucide.createIcons();

        const recipesData = [
            <?php foreach ($recipes as $recipe): ?>
                            {
                    id: <?= $recipe->getRecipesId() ?>,
                    line: "?pg=recette&slug=<?= $recipe->getRecipeSlug() ?>",
                    category: "<?= htmlspecialchars($recipe->getCategory()) ?>",
                    title: "<?= htmlspecialchars($recipe->getRecipeTitle()) ?>",
                    // Si l'image est null, on met une image par défaut ou vide
                    image: "<?= $recipe->getRecipeImg() ? '../../frontend/assets/images/' . $recipe->getRecipeImg() : '' ?>",
                    time: "<?= $recipe->getRecipeCookTime() ?> min",
                    level: "<?= htmlspecialchars($recipe->getLevel()) ?>",
                    servings: "<?= htmlspecialchars($recipe->getServings()) ?>",
                    ingredients: <?= json_encode($recipe->getIngredients()) ?>,
                    desc: <?= json_encode($recipe->getRecipeDesc()) ?>,
                    average_rating: "<?= $recipe->getAverageRating() ?>"
                },
            <?php endforeach; ?>
        ];
        console.log("Loaded Recipes Data:", recipesData);

        const grid = document.getElementById('recipes-grid');
        const modal = document.getElementById('recipe-modal');

        function renderRecipes(filter = 'all') {
            grid.innerHTML = '';
            const filtered = filter === 'all' ? recipesData : recipesData.filter(r => r.category === filter);

            filtered.forEach(recipe => {
                const card = document.createElement('div');
                card.className = "bg-white rounded-2xl overflow-hidden shadow-xl hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2 group cursor-pointer border border-[#4d2c16]/5";
                card.onclick = () => openModal(recipe.id);

                card.innerHTML = `
            <div class="h-48 overflow-hidden relative">
              <img src="${recipe.image}" class="w-full h-full object-cover transition duration-500 group-hover:scale-110" alt="${recipe.title}">
              <div class="absolute top-3 left-3 bg-white/90 backdrop-blur text-[#4d2c16] text-xs font-bold px-3 py-1 rounded-full uppercase tracking-wider">
                ${recipe.category}
              </div>
            </div>
            <div class="p-6">
              <div class="flex justify-between items-start mb-2">
                <h3 class="text-xl font-bold text-[#7a3c18]">${recipe.title}</h3>
                <div class="flex flex-col items-end gap-1">
                  <span class="flex items-center text-xs font-medium text-[#d4a15a]">
                    <i data-lucide="clock" class="w-3 h-3 mr-1"></i> ${recipe.time}
                  </span>
                  ${recipe.average_rating ? `
                  <span class="flex items-center text-xs font-bold text-[#d4a15a]">
                    <i data-lucide="star" class="w-3 h-3 mr-1 fill-[#d4a15a]"></i> ${parseFloat(recipe.average_rating).toFixed(1)}/5
                  </span>` : `
                  <span class="flex items-center text-xs font-medium text-gray-400">
                    <i data-lucide="star" class="w-3 h-3 mr-1"></i> -/5
                  </span>`}
                </div>
              </div>
              <p class="text-sm text-gray-500 line-clamp-2 mb-4">Cliquez pour voir les ingrédients et la préparation complète.</p>


              <button type="button" onclick="openModal(${recipe.id}); event.stopPropagation();"
                      class="w-full py-3 rounded-lg bg-[#fbe7cd] text-[#4d2c16] font-bold hover:bg-[#f9bf29] transition-colors flex justify-center items-center gap-2">
                Voir la recette <i data-lucide="arrow-right" class="w-5 h-5"></i>
              </button>
            </div>
          `;
                grid.appendChild(card);
            });
            lucide.createIcons();
        }

        function filterRecipes(category) {
            document.querySelectorAll('.filter-btn').forEach(btn => {
                btn.classList.remove('bg-[#4d2c16]', 'text-[#f7efe6]', 'ring-2', 'ring-offset-2', 'ring-[#4d2c16]');
                btn.classList.add('bg-white', 'text-[#4d2c16]');
            });
            event.target.classList.remove('bg-white', 'text-[#4d2c16]');
            event.target.classList.add('bg-[#4d2c16]', 'text-[#f7efe6]', 'ring-2', 'ring-offset-2', 'ring-[#4d2c16]');
            renderRecipes(category);
        }

        function openModal(id) {
            const recipe = recipesData.find(r => r.id === id);
            if (!recipe) return;

            document.getElementById('modal-img').src = recipe.image;
            document.getElementById('modal-tag').textContent = recipe.category;
            document.getElementById('modal-title').textContent = recipe.title;
            document.getElementById('modal-time').textContent = recipe.time;
            document.getElementById('modal-servings').textContent = recipe.servings;
            document.getElementById('modal-level').textContent = recipe.level;
            
            const ratingText = recipe.average_rating ? `${parseFloat(recipe.average_rating).toFixed(1)}/5` : '-/5';
            document.getElementById('modal-rating').textContent = ratingText;

            document.getElementById('modal-desc').textContent = recipe.desc;

            const ingList = document.getElementById('modal-ingredients');
            ingList.innerHTML = recipe.ingredients.map(ing => `<li>${ing}</li>`).join('');

            const externalLink = document.getElementById('modal-external-link');
            if (recipe.line) {
                externalLink.href = recipe.line;
                externalLink.classList.remove('hidden');
            } else {
                externalLink.classList.add('hidden');
            }

            modal.classList.remove('hidden');
            document.body.style.overflow = 'hidden';
            lucide.createIcons();
        }

        function closeModal() {
            modal.classList.add('hidden');
            document.body.style.overflow = '';
        }


        renderRecipes();
    </script>

    <script src="../../frontend/assets/js/script.js"></script>
</body>

</html>