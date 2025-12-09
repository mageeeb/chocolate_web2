<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta
        name="description"
        content="Riche, décadent et incroyablement fondant — ces brownies sont le rêve de tout amateur de chocolat. Apprenez à réaliser les brownies au chocolat parfaitement fondants."
    />
    <meta
        property="og:title"
        content="Recette de brownies au chocolat fondants"
    />
    <meta
        property="og:description"
        content="Riche, décadent et incroyablement fondant — ces brownies sont le rêve de tout amateur de chocolat."
    />
    <meta property="og:type" content="article" />
    <title>
        Chocolat Hub - <?= htmlspecialchars($recette->getRecipeTitle()) ?>
    </title>

    <link rel="stylesheet" href="/css/" />

    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Crimson+Text:wght@40[#2B1B12]&display=swap"
        rel="stylesheet"
    />

    <style>
        @import url("https://fonts.googleapis.com/css2?family=Pacifico&display=swap");
        @import url("https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap");

        /* ===== CSS GÉNÉRAL ===== */
        html,
        body {
            margin: 0;
            padding: 0;
            background-color: #f7efe6;
            overflow-x: hidden;
            font-family: "Montserrat", sans-serif;
            color: #2b1b12;
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            font-family: "Pacifico", cursive;
        }

        .star-icon {
            cursor: pointer;
            transition: all 0.2s;
        }
        .star-icon:hover {
            transform: scale(1.1);
        }
        .star-filled {
            fill: #f59e0b;
            color: #f59e0b;
        }
        .star-empty {
            fill: none;
            color: #d1d5db;
        }
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        .animate-fade-in {
            animation: fadeIn 0.7s ease-out forwards;
        }
        .delay-150 {
            animation-delay: 150ms;
        }
        .delay-300 {
            animation-delay: 300ms;
        }
        .delay-500 {
            animation-delay: 500ms;
        }
        .delay-700 {
            animation-delay: 700ms;
        }
        .delay-1000 {
            animation-delay: 1000ms;
        }
    </style>
</head>
<body class="min-h-screen">
<!--NAV BAR-->
<main>
  <?php include "../../frontend/view/components/_menu.html.php"; ?>
</main>
<!-- Header -->
<header class="text-center py-12 px-4 animate-fade-in">
    <h1 class="text-5xl md:text-6xl lg:text-7xl font-bold mb-4">
        <?= htmlspecialchars($recette->getRecipeTitle()) ?>
    </h1>
    <p class="text-lg md:text-xl max-w-2xl mx-auto opacity-80">
        Riche, décadent et incroyablement fondant — ces brownies sont le rêve de
        tout amateur de chocolat.
    </p>
</header>

<!-- Hero Image -->
<section class="px-4 mb-16 animate-fade-in delay-150">
    <div class="max-w-6xl mx-auto">
        <img
            src="../../frontend/assets/images/<?= htmlspecialchars(
              $recette->getRecipeImg(),
            ) ?>"
            alt="Brownies au chocolat fondants fraîchement sortis du four"
            class="w-full h-auto rounded-2xl shadow-xl object-cover"
        />
    </div>
</section>

<!-- Ingredients Section -->
<section class="px-4 mb-16 animate-fade-in delay-300">
    <div class="max-w-6xl mx-auto">
        <h2 class="text-3xl md:text-4xl font-bold mb-8">Ingrédients</h2>
        <div class="grid lg:grid-cols-2 gap-12 items-start">
            <!-- Ingredients List -->
            <div class="space-y-3">
                <ul class="space-y-2.5">
                    <li class="flex items-start">
                        <span class="text-[#2B1B12] mr-3 mt-1 font-bold">•</span>
                        <span>200g de chocolat noir (70% de cacao), haché</span>
                    </li>
                    <li class="flex items-start">
                        <span class="text-[#2B1B12] mr-3 mt-1 font-bold">•</span>
                        <span>175g de beurre non salé, coupé en cubes</span>
                    </li>
                    <li class="flex items-start">
                        <span class="text-[#2B1B12] mr-3 mt-1 font-bold">•</span>
                        <span>3 gros œufs</span>
                    </li>
                    <li class="flex items-start">
                        <span class="text-[#2B1B12] mr-3 mt-1 font-bold">•</span>
                        <span>275g de sucre en poudre</span>
                    </li>
                    <li class="flex items-start">
                        <span class="text-[#2B1B12] mr-3 mt-1 font-bold">•</span>
                        <span>85g de farine tout usage</span>
                    </li>
                    <li class="flex items-start">
                        <span class="text-[#2B1B12] mr-3 mt-1 font-bold">•</span>
                        <span>40g de cacao en poudre</span>
                    </li>
                    <li class="flex items-start">
                        <span class="text-[#2B1B12] mr-3 mt-1 font-bold">•</span>
                        <span>1 c. à café d'extrait de vanille</span>
                    </li>
                    <li class="flex items-start">
                        <span class="text-[#2B1B12] mr-3 mt-1 font-bold">•</span>
                        <span>½ c. à café de sel</span>
                    </li>
                </ul>
            </div>

            <!-- Ingredients Image -->
            <div class="order-first lg:order-last">
                <img
                    src="../../frontend/assets/images/Brownie Ingredients.jpg"
                    alt="Ingrédients pour brownie disposés sur une table"
                    class="w-full h-auto rounded-2xl shadow-lg object-cover"
                />
            </div>
        </div>
    </div>
</section>

<!-- Preparation Steps -->
<section class="px-4 mb-16 animate-fade-in delay-500">
    <div class="max-w-6xl mx-auto">
        <h2 class="text-3xl md:text-4xl font-bold mb-8">Préparation</h2>
        <ol class="space-y-6">
            <li class="flex items-start gap-4">
            <span
                class="flex-shrink-0 w-8 h-8 rounded-full bg-[#2B1B12] text-white flex items-center justify-center font-semibold"
            >
              1
            </span>
                <div class="flex-1">
                    <p class="leading-relaxed">
                        Préchauffez le four à 180°C (350°F). Tapissez un moule carré de
                        23x23 cm (9x9 pouces) de papier sulfurisé, en laissant dépasser
                        les bords pour faciliter le démoulage.
                    </p>
                </div>
            </li>

            <li class="flex items-start gap-4">
            <span
                class="flex-shrink-0 w-8 h-8 rounded-full bg-[#2B1B12] text-white flex items-center justify-center font-semibold"
            >
              2
            </span>
                <div class="flex-1 flex items-start gap-3">
                    <p class="leading-relaxed">
                        Faites fondre le chocolat et le beurre ensemble au bain-marie,
                        en remuant de temps en temps jusqu'à obtention d'un mélange
                        lisse. Retirez du feu et laissez tiédir légèrement.
                    </p>
                </div>
            </li>

            <li class="flex items-start gap-4">
            <span
                class="flex-shrink-0 w-8 h-8 rounded-full bg-[#2B1B12] text-white flex items-center justify-center font-semibold"
            >
              3
            </span>
                <div class="flex-1 flex items-start gap-3">
                    <p class="leading-relaxed">
                        Dans un grand bol, fouettez les œufs, le sucre et la vanille
                        jusqu'à ce que le mélange soit pâle et légèrement épaissi.
                        Versez le mélange chocolaté fondu et incorporez délicatement
                        jusqu'à homogénéité.
                    </p>
                </div>
            </li>

            <li class="flex items-start gap-4">
            <span
                class="flex-shrink-0 w-8 h-8 rounded-full bg-[#2B1B12] text-white flex items-center justify-center font-semibold"
            >
              4
            </span>
                <div class="flex-1">
                    <p class="leading-relaxed">
                        Tamisez la farine, le cacao en poudre et le sel. Incorporez
                        délicatement avec une spatule jusqu'à ce que la préparation soit
                        juste homogène — ne pas trop mélanger !
                    </p>
                </div>
            </li>

            <li class="flex items-start gap-4">
            <span
                class="flex-shrink-0 w-8 h-8 rounded-full bg-[#2B1B12] text-white flex items-center justify-center font-semibold"
            >
              5
            </span>
                <div class="flex-1 flex items-start gap-3">
                    <p class="leading-relaxed">
                        Versez la pâte dans le moule préparé et lissez le dessus. Faites
                        cuire 25 à 30 minutes, jusqu'à ce que le dessus soit pris mais
                        que le centre ait encore un léger tremblement.
                    </p>
                </div>
            </li>

            <li class="flex items-start gap-4">
            <span
                class="flex-shrink-0 w-8 h-8 rounded-full bg-[#2B1B12] text-white flex items-center justify-center font-semibold"
            >
              6
            </span>
                <div class="flex-1">
                    <p class="leading-relaxed">
                        Laissez les brownies refroidir complètement dans le moule avant
                        de les soulever et de les découper en carrés. Cela leur permet
                        de bien se raffermir et d'obtenir cette texture fondante
                        parfaite.
                    </p>
                </div>
            </li>
        </ol>
    </div>
</section>

<!-- Chef's Tip -->
<section class="px-4 mb-16 animate-fade-in [#2B1B12]">
    <div class="max-w-4xl mx-auto">
        <div class="bg-[#efe6de] border-2 border-[#2B1B12] rounded-2xl p-8">
            <div class="flex items-start gap-4">
                <svg
                    class="w-8 h-8 text-[#2B1B12] flex-shrink-0"
                    fill="none"
                    stroke="currentColor"
                    viewBox="0 0 24 24"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"
                    />
                </svg>
                <div>
                    <h3 class="text-2xl font-bold mb-3">Astuce du chef</h3>
                    <p class="leading-relaxed">
                        Le secret pour des brownies ultra fondants est de les cuire
                        légèrement moins longtemps. Ils doivent encore avoir un léger
                        tremblement au centre lorsque vous les sortez du four. En
                        refroidissant, ils se raffermiront et prendront la texture
                        collante idéale. Si vous préférez des brownies plus proches d'un
                        gâteau, prolongez la cuisson de 5 à 7 minutes.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Comments Section -->
<section id="commentaire-section2" class="mt-10">
    <h1
            class="relative text-5xl text-[#4d2c16] text-center  mb-5 block pb-5 bg-no-repeat bg-bottom bg-[length:130%_15px] "
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
                    <input type="text" name="comment_sujet" id="comment_sujet2" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                </div>
                <div class="mb-4">
                    <label for="comment_message" class="block text-gray-700 text-sm font-bold mb-2">Votre commentaire:</label>
                    <textarea name="comment_message" id="comment_message2" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline h-24 resize-none" required></textarea>
                </div>
                <?php
                // On récupère les informations sur les likes
                $likesInfo = $recette->getLikesInfo();
                $averageRating = $likesInfo["average"] ?? 0;
                $ratingCount = $likesInfo["count"] ?? 0;
                $recipeId = $recette->getRecipesId();
                ?>
                <div id="rating-section" data-recipe-id="<?= $recipeId ?>" class="flex items-center gap-1 mb-5">
                    <span id="rating-average"><?= number_format(
                      $averageRating,
                      1,
                    ) ?></span>/5
                    (<span id="rating-count"><?= $ratingCount ?></span>)
                    <div id="star-rating" class="flex ml-2">
                        <?php for ($i = 1; $i <= 5; $i++): ?>
                            <svg class="w-5 h-5 cursor-pointer star" data-rating="<?= $i ?>" fill="<?= $i <=
round($averageRating)
  ? "#facc15"
  : "currentColor" ?>" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 2l3.09 6.26L22 9.27l-5 4.87L18.18 22 12 18.82 5.82 22 7 14.14 2 9.27l6.91-1.01L12 2z"></path>
                            </svg>
                        <?php endfor; ?>
                    </div>
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
                        <p class="font-bold text-[#4d2c16]"><?= htmlspecialchars(
                          $comment->getUsers()->getUserName(),
                        ) ?> a dit :</p>
                        <p class="text-gray-600 text-sm"><span class="font-bold">Sujet</span> : <?= htmlspecialchars(
                          $comment->getCommentSujet(),
                        ) ?></p>
                        <p class="text-gray-800 text-sm mt-2"><?= nl2br(
                          htmlspecialchars($comment->getCommentMessage()),
                        ) ?></p>
                        <span class="text-xs text-gray-500"><?= date(
                          "d/m/Y H:i",
                          strtotime($comment->getCommentCreatedDate()),
                        ) ?></span>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p class="text-center text-gray-500">Aucun commentaire pour le moment.</p>
            <?php endif; ?>
        </div>
    </div>
</section>

<!-- Footer -->
<?php include "../../frontend/view/components/_footer.html.php"; ?>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const starRatingContainer = document.getElementById('star-rating');
    const stars = starRatingContainer ? starRatingContainer.querySelectorAll('.star') : [];
    const recipeId = document.getElementById('rating-section')?.dataset.recipeId;
    const ratingAverageSpan = document.getElementById('rating-average');
    const ratingCountSpan = document.getElementById('rating-count');

    if (!starRatingContainer || !recipeId) {
        console.warn('Star rating container or recipe ID not found. Skipping rating functionality.');
        return;
    }

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
});
</script>

</body>
</html>
