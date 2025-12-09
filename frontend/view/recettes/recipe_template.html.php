<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Chocolat Hub - <?= htmlspecialchars($recette->getRecipeTitle()) ?></title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="../../frontend/assets/css/style.css" />
    <link
        rel="icon"
        href="../../frontend/assets/images/tablette_chocolat1.ico"
        type="image/png"
    />
    <!-- Import Lucide -->
    <script src="https://unpkg.com/lucide@latest"></script>
    <!-- Script AlpineJS-->
    <script
        defer
        src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"
    ></script>
</head>
<body class="recette-sam-2">
<!-- Flèche pour navigation, à adapter ou retirer si non pertinent pour une page générée -->
<a href="#" class="arrow-nav right">
    <svg
        xmlns="http://www.w3.org/2000/svg"
        width="24"
        height="24"
        viewBox="0 0 24 24"
        fill="none"
        stroke="currentColor"
        stroke-width="2"
        stroke-linecap="round"
        stroke-linejoin="round"
        class="lucide lucide-chevron-right"
    >
        <path d="m9 18 6-6-6-6" />
    </svg>
</a>

<main>
    <!-- Navbar -->
    <?php include "../../frontend/view/components/_menu.html.php"; ?>
</main>


<section class="container mx-auto px-5 my-5">
    <!-- Titres -->
    <div
        class="recette-title flex flex-col justify-center text-center items-center mx-auto mt-10"
    >
        <h1 class="text-4xl font-bold md:text-7xl mt-10 md:mt-0 text-[#4d2c16]">
            <?= htmlspecialchars($recette->getRecipeTitle()) ?>
        </h1>
        <!-- SVG (Points) -->
        <svg
            width="200"
            height="50"
            viewBox="0 0 200 50"
            xmlns="http://www.w3.org/2000/svg"
        >
            <circle cx="10" cy="25" r="2" fill="#4d2c16" />
            <circle cx="30" cy="25" r="3" fill="#4d2c16" />
            <circle cx="50" cy="25" r="4" fill="#4d2c16" />
            <circle cx="70" cy="25" r="5" fill="#4d2c16" />
            <circle cx="90" cy="25" r="6" fill="#4d2c16" />
            <circle cx="110" cy="25" r="5" fill="#4d2c16" />
            <circle cx="130" cy="25" r="4" fill="#4d2c16" />
            <circle cx="150" cy="25" r="3" fill="#4d2c16" />
            <circle cx="170" cy="25" r="2" fill="#4d2c16" />
        </svg>
        <!-- Description -->
        <p class="mt-5 text-[#7a3c18] mb-5">
            <?= htmlspecialchars($recette->getRecipeDesc()) ?>
        </p>
    </div>

    <!-- Image / Ingredients -->
    <section
        class="grid grid-cols-1 md:grid-cols-6 lg:grid-cols-4 md:gap-0 lg:gap-10 mb-10 md:mb-0"
    >
        <!-- Image -->
        <div class="md:col-span-3 lg:col-span-2 relative">
            <img
                src="../../frontend/assets/images/<?= htmlspecialchars($recette->getRecipeImg() ?? 'default.jpg') ?>"
                alt="<?= htmlspecialchars($recette->getRecipeTitle()) ?>"
                class="mx-auto ps-5 md:ps-0 w-full max-w-[500px] sm:pt-0 md:pt-10 lg:pt-0 my-[50px] md:my-0 my-0"
            />
            <div class="scroll">
                <span class="text-sm">Scrollez</span>
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    width="24"
                    height="24"
                    viewBox="0 0 24 24"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="2"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    class="lucide lucide-arrow-down"
                >
                    <path d="M12 5v14" />
                    <path d="m19 12-7 7-7-7" />
                </svg>
            </div>
        </div>
        <!-- Ingrédients -->
        <div
            class="py-0 md:py-10 ps-5 md:ps-20 flex flex-col align-center md:col-span-3 lg:col-span-2"
        >
            <span class="ingredient-name">Difficulté : Facile</span>
            <!-- Ligne d'infos avec icônes -->
            <div class="flex flex-wrap gap-6 text-[#7a3c18] text-sm mt-3">
            <span class="flex items-center gap-1">
              <i data-lucide="alarm-clock" class="w-5 h-5"></i> <?= htmlspecialchars($recette->getRecipeCookTime()) ?> min
            </span>
                <span class="flex items-center gap-1">
              <i data-lucide="users" class="w-5 h-5"></i> 6
            </span>
                <?php
                // On récupère les informations sur les likes
                $likesInfo = $recette->getLikesInfo();
                $averageRating = $likesInfo['average'] ?? 0;
                $ratingCount = $likesInfo['count'] ?? 0;
                $recipeId = $recette->getRecipesId();
                ?>
                <div id="rating-section" data-recipe-id="<?= $recipeId ?>" class="flex items-center gap-1">
                    <i data-lucide="star" class="w-5 h-5"></i>
                    <span id="rating-average"><?= number_format($averageRating, 1) ?></span>/ 5.0
                    (<span><?= $ratingCount ?></span>)
                    <div id="star-rating" class="flex ml-2">
                        <?php for ($i = 1; $i <= 5; $i++): ?>
                            <svg class="w-5 h-5 cursor-pointer star" data-rating="<?= $i ?>" fill="<?= $i <= round($averageRating) ? '#facc15' : 'currentColor' ?>" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 2l3.09 6.26L22 9.27l-5 4.87L18.18 22 12 18.82 5.82 22 7 14.14 2 9.27l6.91-1.01L12 2z"></path>
                            </svg>
                        <?php endfor; ?>
                    </div>
                </div>
            </div>
            <!-- Titre -->
            <h2
                class="relative text-3xl text-[#4d2c16] inline-block py-5 bg-no-repeat bg-[position:-170px_100%] md:bg-[position:-115px_100%] lg:bg-[position:-185px_100%] xl:bg-[position:-265px_100%] 2xl:bg-[position:-350px_100%] bg-[length:130%_12px] bg-[url('data:image/svg+xml,%3Csvg%20xmlns%3D%22http://www.w3.org/2000/svg%22%20viewBox%3D%220%200%20240%2020%22%3E%3Cpath%20d%3D%22M5%2010%20Q25%203%2050%2010%20T100%2010%20T150%2010%20T235%2010%22%20stroke%3D%22%234d2c16%22%20stroke-width%3D%224%22%20fill%3D%22none%22%20stroke-linecap%3D%22round%22/%3E%3C/svg%3E')]"
            >
                Ingrédients
            </h2>
            <!-- Liste ingrédients (à modifier manuellement ou via une DB si le projet évolue) -->
            <ul
                class="list-[square] list-inside md:text-sm lg:text-base text-[#7a3c18] mt-3"
            >
                <!-- Exemple d'ingrédients, à remplacer par la logique de récupération si possible -->
                <li><span class="font-bold">Quantité</span> Ingrédient 1</li>
                <li><span class="font-bold">Quantité</span> Ingrédient 2</li>
                <li><span class="font-bold">Quantité</span> Ingrédient 3</li>
            </ul>
        </div>
    </section>

    <!-- Slide ingrédients (optionnel, à retirer si non pertinent) -->
    <div
        class="marquee-container w-full overflow-hidden border-y-2 border-y-[#7a3c18]/90 shadow-md py-4 bg-white/5 backdrop-blur-extra-light md:mt-6 lg:mt-0 mb-10"
    >
        <div class="animate-marquee flex w-[300%] lg:w-[200%]">
            <!-- Répéter les divs d'ingrédients ici si nécessaire, ou retirer -->
            <div
                class="w-1/2 flex flex-shrink-0 items-center justify-around gap-x-0.5 sm:gap-x-1 md:gap-x-4 lg:gap-x-8 xl:gap-x-12"
            >
                <div class="flex flex-col items-center ms-4 md:ms-10 lg:ms-14">
                    <img
                        src="../../frontend/assets/images/oeufs.png"
                        alt="Œufs"
                        class="w-12 h-12 sm:w-16 sm:h-16 md:w-20 md:h-20"
                    />
                    <p class="mt-2 text-center text-[0.5rem] sm:text-xs md:text-sm">
                        Oeufs
                    </p>
                </div>
            </div>
            <div
                class="w-1/2 flex flex-shrink-0 items-center justify-around gap-x-0.5 sm:gap-x-1 md:gap-x-4 lg:gap-x-8 xl:gap-x-12"
            >
                <div class="flex flex-col items-center ms-4 md:ms-10 lg:ms-14">
                    <img
                        src="../../frontend/assets/images/oeufs.png"
                        alt="Œufs"
                        class="w-12 h-12 sm:w-16 sm:h-16 md:w-20 md:h-20"
                    />
                    <p class="mt-2 text-center text-[0.5rem] sm:text-xs md:text-sm">
                        Oeufs
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- Réalisations (étapes) -->
    <section class="ps-5 md:ps-0">
        <h1
            class="relative text-3xl text-[#4d2c16] inline-block pb-5 bg-no-repeat bg-bottom bg-[length:130%_12px] bg-[url('data:image/svg+xml,%3Csvg%20xmlns%3D%22http://www.w3.org/2000/svg%22%20viewBox%3D%220%200%20240%2020%22%3E%3Cpath%20d%3D%22M5%2010%20Q25%203%2050%2010%20T100%2010%20T150%2010%20T235%2010%22%20stroke%3D%22%234d2c16%22%20stroke-width%3D%224%22%20fill%3D%22none%22%20stroke-linecap%3D%22round%22/%3E%3C/svg%3E')]"
        >
            Réalisation
        </h1>

        <div
            class="grid grid-cols-1 md:grid-cols-2 gap-10 mt-10 text-[#7a3c18] relative"
        >
            <!-- 1ère colonne -->
            <div class="pr-5 relative z-10">
                <p class="mb-3">
                    <span class="text-[#4d2c16] text-3xl font-bold">1 </span>
                    <!-- Étape 1 -->
                    Description de l'étape 1.
                </p>
                <p class="mb-3">
                    <span class="text-[#4d2c16] text-3xl font-bold">2 </span>
                    <!-- Étape 2 -->
                    Description de l'étape 2.
                </p>
                <p>
                    <span class="text-[#4d2c16] text-3xl font-bold">3 </span>
                    <!-- Étape 3 -->
                    Description de l'étape 3.
                </p>
            </div>

            <!-- 2ème colonne -->
            <div class="pr-5 relative z-10">
                <p class="mb-20">
                    <span class="text-[#4d2c16] text-3xl font-bold">4 </span>
                    <!-- Étape 4 -->
                    Description de l'étape 4.
                </p>
                <p class="ps-10 text-3xl text-[#4d2c16] font-bold pb-5">
                    BON APPÉTIT !
                </p>
            </div>

            <!-- Trait vertical -->
            <div
                class="absolute top-0 bottom-0 left-1/2 w-[6px] -translate-x-1/2 z-0 hidden md:block"
            >
                <svg
                    class="w-full h-full"
                    viewBox="0 0 6 100"
                    preserveAspectRatio="none"
                    xmlns="http://www.w3.org/2000/svg"
                >
                    <path
                        d="M3 0 C6 25 0 75 3 100"
                        stroke="#b47b52"
                        stroke-width="1"
                        fill="none"
                    />
                </svg>
            </div>
        </div>
    </section>

    <!-- Astouce (optionnel, à retirer si non pertinent) -->
    <section class="astouce text-center my-10">
        <h1
            class="mb-2 md:mb-1 text-2xl text-[#4d2c16] inline-block bg-yellow-400 px-2 rounded"
        >
            Astuce
        </h1>
        <p class="text-[#7a3c18] font-medium px-4 md:px-24">
            Une astuce pour cette recette.
        </p>
    </section>

    <!-- Commentaires -->
    <section id="commentaire-section" class="mt-10">
        <h1
            class="relative text-3xl text-[#4d2c16] text-center mb-5 block pb-5 bg-no-repeat bg-bottom bg-[length:130%_15px] bg-[url('data:image/svg+xml,%3Csvg%20xmlns%3D%22http://www.w3.org/2000/svg%22%20viewBox%3D%220%200%20240%2020%22%3E%3Cpath%20d%3D%22M5%2010%20Q25%203%2050%2010%20T100%2010%20T150%2010%20T235%2010%22%20stroke%3D%22%234d2c16%22%20stroke-width%3D%224%22%20fill%3D%22none%22%20stroke-linecap%3D%22round%22/%3E%3C/svg%3E')]"
        >
            Commentaires
        </h1>
        <div class="max-w-2xl mx-auto p-5 rounded-lg shadow-xl backdrop-blur-extra-light">
            <?php if (!empty($_SESSION["users_id"])): ?>
                <!-- Formulaire de commentaire en PHP -->
                <form action="?pg=recette&slug=<?= $recette->getRecipeSlug() ?>" method="POST" class="mb-6">
                    <input type="hidden" name="action" value="submit-comment">
                    <div class="mb-4">
                        <label for="comment_sujet" class="block text-gray-700 text-sm font-bold mb-2">Sujet:</label>
                        <input type="text" name="comment_sujet" id="comment_sujet" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                    </div>
                    <div class="mb-4">
                        <label for="comment_message" class="block text-gray-700 text-sm font-bold mb-2">Votre commentaire:</label>
                        <textarea name="comment_message" id="comment_message" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline h-24 resize-none" required></textarea>
                    </div>
                    <button type="submit" class="bg-[#4d2c16] hover:bg-[#7a3c18] text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                        Envoyer
                    </button>
                </form>
            <?php else: ?>
                <div class="mb-6 text-center bg-gray-200 text-gray-800 border border-gray-400 rounded py-3 px-4">
                    Veuillez vous <a href="?pg=login" class="underline text-gray-900 hover:text-black font-semibold">connecter</a> pour poster un commentaire&nbsp;!
                </div>
            <?php endif; ?>

            <!-- Fil des commentaires -->
            <div class="space-y-4">
                <?php if (!empty($recette->getComments())): ?>
                    <?php foreach ($recette->getComments() as $comment): ?>
                        <div class="bg-gray-100 p-4 rounded-lg">
                            <p class="font-bold text-[#4d2c16]"><?= htmlspecialchars($comment->getUsers()->getUserName()) ?> a dit :</p>
                            <p class="text-gray-600 text-sm"><span class="font-bold">Sujet</span> : <?= htmlspecialchars($comment->getCommentSujet()) ?></p>
                            <p class="text-gray-800 text-sm mt-2"><?= nl2br(htmlspecialchars($comment->getCommentMessage())) ?></p>
                            <span class="text-xs text-gray-500"><?= date("d/m/Y H:i", strtotime($comment->getCommentCreatedDate())) ?></span>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p class="text-center text-gray-500">Aucun commentaire pour le moment.</p>
                <?php endif; ?>
            </div>
        </div>
    </section>
</section>

<!-- Footer -->
<?php include "../../frontend/view/components/_footer.html.php"; ?>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        // Initialisation des icônes Lucide
        lucide.createIcons();

        // Logique de notation (étoiles) - peut être retirée si non pertinente ou adaptée
        const starRatingContainer = document.getElementById('star-rating');
        const stars = starRatingContainer ? starRatingContainer.querySelectorAll('.star') : [];
        const recipeId = document.getElementById('rating-section')?.dataset.recipeId;
        const ratingAverageSpan = document.getElementById('rating-average');
        const ratingCountSpan = document.getElementById('rating-count');

        if (starRatingContainer && recipeId) {
            const updateStars = (average) => {
                stars.forEach(star => {
                    const rating = parseInt(star.dataset.rating);
                    if (rating <= Math.round(average)) {
                        star.setAttribute('fill', '#facc15');
                    } else {
                        star.setAttribute('fill', 'currentColor');
                    }
                });
            };
            // Mise à jour initiale des étoiles basée sur la moyenne actuelle
            updateStars(parseFloat(ratingAverageSpan?.textContent || '0'));


            stars.forEach(star => {
                star.addEventListener('click', async (event) => {
                    const rating = parseInt(event.currentTarget.dataset.rating);

                    const formData = new FormData();
                    formData.append('recipe_id', recipeId);
                    formData.append('rating', rating);

                    try {
                        const response = await fetch('?pg=like-recipe', {
                            method: 'POST',
                            body: formData
                        });
                        const data = await response.json();

                        if (data.success) {
                            if (ratingAverageSpan) ratingAverageSpan.textContent = parseFloat(data.new_average).toFixed(1);
                            if (ratingCountSpan) ratingCountSpan.textContent = data.new_count;
                            updateStars(data.new_average);
                        } else {
                            alert(data.message);
                        }
                    } catch (error) {
                        console.error('Error submitting rating:', error);
                        alert('Une erreur est survenue lors de la soumission de votre note.');
                    }
                });
            });
        }

        // Animation de la flèche de navigation (si conservée)
        const arrowNavRight = document.querySelector('.arrow-nav.right');
        if (arrowNavRight) {
            arrowNavRight.addEventListener('click', function(e) {
                e.preventDefault();
                const href = this.href;
                document.body.classList.add('page-turn-right');
                setTimeout(function() {
                    window.location = href;
                }, 900); // Match animation duration
            });
        }
    });
</script>
</body>
</html>