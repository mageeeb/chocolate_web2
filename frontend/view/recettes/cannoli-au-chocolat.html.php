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
<body class="recette-sam-4">
<!-- Flèches -->
<a href="?pg=recette&slug=tiramisu-au-chocolat" class="arrow-nav left">
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
        class="lucide lucide-chevron-left"
    >
        <path d="m15 18-6-6 6-6" />
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
        <h1 class="text-4xl md:text-7xl mt-10 md:mt-0 text-[#4d2c16]">
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
        <p class="mt-5 text-[#7a3c18]">
            <?= htmlspecialchars($recette->getRecipeDesc()) ?>
        </p>
    </div>

    <!-- Image / Ingredients -->
    <section
        class="grid grid-cols-1 md:grid-cols-6 lg:grid-cols-4 gap-10 mb-10 md:mb-0"
    >
        <div
            class="md:mt-10 lg:mt-0 py-0 lg:py-16 ps-5 md-ps-10 lg:ps-20 flex flex-col align-center md:col-span-3 lg:col-span-2 order-2 md:order-1"
        >
            <!-- Ingrédients -->
            <span class="ingredient-name">Difficulté : Moyenne</span>
            <!-- Ligne d'infos avec icônes -->
            <div class="flex flex-wrap gap-4 text-[#7a3c18] text-sm mt-3">
            <span class="flex items-center gap-1">
              <i data-lucide="alarm-clock" class="w-5 h-5"></i> <?= htmlspecialchars($recette->getRecipeCookTime()) ?> min
            </span>
                <span class="flex items-center gap-1">
              <i data-lucide="users" class="w-5 h-5"></i> 8-10
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
                    (<span id="rating-count"><?= $ratingCount ?></span>)
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
                class="relative text-3xl text-[#4d2c16] inline-block py-5 bg-no-repeat bg-[position:-170px_100%] md:bg-[position:-140px_100%] lg:bg-[position:-185px_100%] xl:bg-[position:-265px_100%] 2xl:bg-[position:-350px_100%] bg-[length:130%_12px] bg-[url('data:image/svg+xml,%3Csvg%20xmlns%3D%22http://www.w3.org/2000/svg%22%20viewBox%3D%220%200%20240%2020%22%3E%3Cpath%20d%3D%22M5%2010%20Q25%203%2050%2010%20T100%2010%20T150%2010%20T235%2010%22%20stroke%3D%22%234d2c16%22%20stroke-width%3D%224%22%20fill%3D%22none%22%20stroke-linecap%3D%22round%22/%3E%3C/svg%3E')]"
            >
                Ingrédients
            </h2>
            <!-- Liste ingrédients -->
            <div
                class="grid grid-cols-1 md:grid-cols-2 gap-10 mt-3 md:mb-16 lg:mb-2"
            >
                <!-- Colonne 1 -->
                <div class="space-y-1">
              <span class="text-base lg:text-xl font-bold text-[#7a3c18] mt-3"
              >Pour la Pâte (Coques) :</span
              >
                    <ul
                        class="list-[square] list-inside md:text-sm lg:text-base text-[#7a3c18] pl-0"
                    >
                        <li><span class="font-bold">200 g</span> de farine</li>
                        <li>
                            <span class="font-bold">1 C.S.</span> de cacao en poudre
                        </li>
                        <li><span class="font-bold">1 C.S.</span> de sucre</li>
                        <li><span class="font-bold">20 g</span> de beurre fondu</li>
                        <li>
                            <span class="font-bold">5 cl</span> de vin blanc sec (ou
                            Marsala)
                        </li>
                    </ul>
                </div>

                <!-- Colonne 2 -->
                <div class="space-y-1">
              <span class="text-base lg:text-xl font-bold text-[#7a3c18] mt-3"
              >Pour la Garniture :</span
              >
                    <ul
                        class="list-[square] list-inside md:text-sm lg:text-base text-[#7a3c18] pl-0"
                    >
                        <li>
                            <span class="font-bold">500 g</span> de Ricotta bien égouttée
                        </li>
                        <li><span class="font-bold">150 g</span> de sucre glace</li>
                        <li>
                            <span class="font-bold">100 g</span> de pépites de chocolat
                            noir
                        </li>
                        <li>
                            <span class="font-bold">1/2</span> Zeste d'orange non traitée
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- Image -->
        <div class="md:col-span-3 lg:col-span-2 order-1 md:order-2 relative">
            <img
                src="../../frontend/assets/images/<?= htmlspecialchars($recette->getRecipeImg()) ?>"
                alt="<?= htmlspecialchars($recette->getRecipeTitle()) ?>"
                class="mx-auto ps-2 md:ps-0 w-full lg:max-w-[600px] mb-[70px] md:mb-0 mt-[50px] md:mt-[100px] lg:mt-20 xl:mt-0 my-0 md:my-10"
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
    </section>

    <!-- Slide ingrédients -->
    <div
        class="marquee-container w-full overflow-hidden border-y-2 border-y-[#7a3c18]/90 shadow-md py-4 bg-white/5 backdrop-blur-extra-light mb-10"
    >
        <div class="animate-marquee flex w-[400%] lg:w-[250%]">
            <div
                class="w-1/2 flex flex-shrink-0 items-center justify-around gap-x-0.5 sm:gap-x-1 md:gap-x-4 lg:gap-x-8 xl:gap-x-12"
            >
                <div class="flex flex-col items-center ms-4 md:ms-10 lg:ms-14">
                    <img
                        src="../../frontend/assets/images/farine.png"
                        alt="Farine"
                        class="w-12 h-12 sm:w-16 sm:h-16 md:w-20 md:h-20"
                    />
                    <p class="mt-2 text-center text-[0.5rem] sm:text-xs md:text-sm">
                        Farine
                    </p>
                </div>
                <div class="flex flex-col items-center">
                    <img
                        src="../../frontend/assets/images/chocolat_poudre.png"
                        alt="Cacao en poudre"
                        class="w-12 h-12 sm:w-16 sm:h-16 md:w-20 md:h-20"
                    />
                    <p class="mt-2 text-center text-[0.5rem] sm:text-xs md:text-sm">
                        Cacao en poudre
                    </p>
                </div>
                <div class="flex flex-col items-center">
                    <img
                        src="../../frontend/assets/images/sucre.png"
                        alt="Sucre en poudre"
                        class="w-12 h-12 sm:w-16 sm:h-16 md:w-20 md:h-20"
                    />
                    <p class="mt-2 text-center text-[0.5rem] sm:text-xs md:text-sm">
                        Sucre en poudre
                    </p>
                </div>
                <div class="flex flex-col items-center">
                    <img
                        src="../../frontend/assets/images/beurre.png"
                        alt="Beurre"
                        class="w-12 h-12 sm:w-16 sm:h-16 md:w-20 md:h-20"
                    />
                    <p class="mt-2 text-center text-[0.5rem] sm:text-xs md:text-sm">
                        Beurre
                    </p>
                </div>
                <div class="flex flex-col items-center">
                    <img
                        src="../../frontend/assets/images/marsala.png"
                        alt="Marsala"
                        class="w-12 h-12 sm:w-16 sm:h-16 md:w-20 md:h-20"
                    />
                    <p class="mt-2 text-center text-[0.5rem] sm:text-xs md:text-sm">
                        Marsala
                    </p>
                </div>
                <div class="flex flex-col items-center">
                    <img
                        src="../../frontend/assets/images/ricotta.png"
                        alt="Ricotta"
                        class="w-12 h-12 sm:w-16 sm:h-16 md:w-20 md:h-20"
                    />
                    <p class="mt-2 text-center text-[0.5rem] sm:text-xs md:text-sm">
                        Ricotta
                    </p>
                </div>
                <div class="flex flex-col items-center">
                    <img
                        src="../../frontend/assets/images/sucre_glace.png"
                        alt="Sucre glace"
                        class="w-12 h-12 sm:w-16 sm:h-16 md:w-20 md:h-20"
                    />
                    <p class="mt-2 text-center text-[0.5rem] sm:text-xs md:text-sm">
                        Sucre glace
                    </p>
                </div>
                <div class="flex flex-col items-center">
                    <img
                        src="../../frontend/assets/images/pepites_chocolat.png"
                        alt="Pépites de chocolat"
                        class="w-12 h-12 sm:w-16 sm:h-16 md:w-20 md:h-20"
                    />
                    <p class="mt-2 text-center text-[0.5rem] sm:text-xs md:text-sm">
                        Pépites de chocolat
                    </p>
                </div>
                <div class="flex flex-col items-center">
                    <img
                        src="../../frontend/assets/images/zestes_orange.png"
                        alt="Zestes d'orange"
                        class="w-12 h-12 sm:w-16 sm:h-16 md:w-20 md:h-20"
                    />
                    <p class="mt-2 text-center text-[0.5rem] sm:text-xs md:text-sm">
                        Zestes d'orange
                    </p>
                </div>
                <div
                    class="h-6 sm:h-8 md:h-12 lg:h-16 xl:h-20 w-px bg-gray-400"
                ></div>
            </div>
            <div
                class="w-1/2 flex flex-shrink-0 items-center justify-around gap-x-0.5 sm:gap-x-1 md:gap-x-4 lg:gap-x-8 xl:gap-x-12"
            >
                <div class="flex flex-col items-center ms-4 md:ms-10 lg:ms-14">
                    <img
                        src="../../frontend/assets/images/farine.png"
                        alt="Farine"
                        class="w-12 h-12 sm:w-16 sm:h-16 md:w-20 md:h-20"
                    />
                    <p class="mt-2 text-center text-[0.5rem] sm:text-xs md:text-sm">
                        Farine
                    </p>
                </div>
                <div class="flex flex-col items-center">
                    <img
                        src="../../frontend/assets/images/chocolat_poudre.png"
                        alt="Cacao en poudre"
                        class="w-12 h-12 sm:w-16 sm:h-16 md:w-20 md:h-20"
                    />
                    <p class="mt-2 text-center text-[0.5rem] sm:text-xs md:text-sm">
                        Cacao en poudre
                    </p>
                </div>
                <div class="flex flex-col items-center">
                    <img
                        src="../../frontend/assets/images/sucre.png"
                        alt="Sucre en poudre"
                        class="w-12 h-12 sm:w-16 sm:h-16 md:w-20 md:h-20"
                    />
                    <p class="mt-2 text-center text-[0.5rem] sm:text-xs md:text-sm">
                        Sucre en poudre
                    </p>
                </div>
                <div class="flex flex-col items-center">
                    <img
                        src="../../frontend/assets/images/beurre.png"
                        alt="Beurre"
                        class="w-12 h-12 sm:w-16 sm:h-16 md:w-20 md:h-20"
                    />
                    <p class="mt-2 text-center text-[0.5rem] sm:text-xs md:text-sm">
                        Beurre
                    </p>
                </div>
                <div class="flex flex-col items-center">
                    <img
                        src="../../frontend/assets/images/marsala.png"
                        alt="Marsala"
                        class="w-12 h-12 sm:w-16 sm:h-16 md:w-20 md:h-20"
                    />
                    <p class="mt-2 text-center text-[0.5rem] sm:text-xs md:text-sm">
                        Marsala
                    </p>
                </div>
                <div class="flex flex-col items-center">
                    <img
                        src="../../frontend/assets/images/ricotta.png"
                        alt="Ricotta"
                        class="w-12 h-12 sm:w-16 sm:h-16 md:w-20 md:h-20"
                    />
                    <p class="mt-2 text-center text-[0.5rem] sm:text-xs md:text-sm">
                        Ricotta
                    </p>
                </div>
                <div class="flex flex-col items-center">
                    <img
                        src="../../frontend/assets/images/sucre_glace.png"
                        alt="Sucre glace"
                        class="w-12 h-12 sm:w-16 sm:h-16 md:w-20 md:h-20"
                    />
                    <p class="mt-2 text-center text-[0.5rem] sm:text-xs md:text-sm">
                        Sucre glace
                    </p>
                </div>
                <div class="flex flex-col items-center">
                    <img
                        src="../../frontend/assets/images/pepites_chocolat.png"
                        alt="Pépites de chocolat"
                        class="w-12 h-12 sm:w-16 sm:h-16 md:w-20 md:h-20"
                    />
                    <p class="mt-2 text-center text-[0.5rem] sm:text-xs md:text-sm">
                        Pépites de chocolat
                    </p>
                </div>
                <div class="flex flex-col items-center">
                    <img
                        src="../../frontend/assets/images/zestes_orange.png"
                        alt="Zestes d'orange"
                        class="w-12 h-12 sm:w-16 sm:h-16 md:w-20 md:h-20"
                    />
                    <p class="mt-2 text-center text-[0.5rem] sm:text-xs md:text-sm">
                        Zestes d'orange
                    </p>
                </div>
                <div
                    class="h-6 sm:h-8 md:h-12 lg:h-16 xl:h-20 w-px bg-gray-400"
                ></div>
            </div>
        </div>
    </div>

    <!-- Réalisations (étapes) -->
    <section class="ps-5 md:ps-0">
        <h1
            class="relative text-3xl text-[#4d2c16] inline-block md:block md:pe-10 md:text-end pb-5 bg-no-repeat bg-bottom md:bg-[position:-170px_100%] md:bg-[position:145px_100%] lg:bg-[position:233px_100%] xl:bg-[position:325px_100%] 2xl:bg-[position:415px_100%] bg-[length:130%_12px] bg-[url('data:image/svg+xml,%3Csvg%20xmlns%3D%22http://www.w3.org/2000/svg%22%20viewBox%3D%220%200%20240%2020%22%3E%3Cpath%20d%3D%22M5%2010%20Q25%203%2050%2010%20T100%2010%20T150%2010%20T235%2010%22%20stroke%3D%22%234d2c16%22%20stroke-width%3D%224%22%20fill%3D%22none%22%20stroke-linecap%3D%22round%22/%3E%3C/svg%3E')]"
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
                    <strong>Préparation de la crème (la veille)</strong> : Mélangez la
                    ricotta égouttée, le sucre glace, les pépites de chocolat et les
                    zestes d'orange. Couvrez et placez au réfrigérateur toute la nuit.
                    Cette étape est cruciale pour une crème ferme.
                </p>
                <p class="mb-3">
                    <span class="text-[#4d2c16] text-3xl font-bold">2 </span>
                    <strong>Préparation de la pâte</strong> : Mélangez la farine, le
                    cacao en poudre et le sucre. Ajoutez le beurre fondu et le vin.
                    Pétrissez jusqu'à obtenir une boule de pâte lisse. Laissez reposer
                    30 minutes.
                </p>
                <p>
                    <span class="text-[#4d2c16] text-3xl font-bold">3 </span>
                    <strong>Former et frire les tubes</strong> : Abaissez la pâte très
                    finement. Coupez des cercles ou des ovales. Enroulez-les autour
                    des tubes métalliques à cannoli et scellez les bords avec un peu
                    de blanc d'œuf. Plongez-les dans l'huile chaude (180°C) jusqu'à ce
                    qu'ils soient dorés et croustillants. Égouttez et retirez les
                    tubes métalliques délicatement.
                </p>
            </div>

            <!-- 2ème colonne -->
            <div class="pr-5 relative z-10">
                <p class="mb-3">
                    <span class="text-[#4d2c16] text-3xl font-bold">4 </span>
                    <strong>Garnissage</strong> : Remplissez la crème de ricotta au
                    chocolat dans une poche à douille. Juste avant de servir (pour
                    éviter que la coque ne ramollisse), remplissez les coques des deux
                    côtés.
                </p>
                <p class="mb-20">
                    <span class="text-[#4d2c16] text-3xl font-bold">5 </span>
                    <strong>Finitions</strong> : Décorez les extrémités avec des
                    pépites de chocolat supplémentaires ou une cerise confite si vous
                    le souhaitez. Saupoudrez légèrement de sucre glace.
                </p>
                <p class="ps-10 text-3xl text-[#4d2c16] font-bold pb-5">
                    È PERFETTO ! BUON APPETITO !
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

    <!-- Astouce -->
    <section class="astouce text-center my-10">
        <h1
            class="mb-2 md:mb-1 text-2xl text-[#4d2c16] inline-block bg-yellow-400 px-2 rounded"
        >
            Astouce
        </h1>
        <p class="text-[#7a3c18] font-medium px-4 md:px-24">
            Garnissez les coques au dernier moment. Sinon, c'est comme donner un
            bain à votre croustillant : c'est très doux, mais qui veut d'un
            cannoli qui fait PLOUF ?
        </p>
    </section>

    <!-- Chiffre page -->
    <p class="text-center mt-10 font-bold">2</p>

    <!-- Commentaires -->
    <section id="commentaire-section2" class="mt-10">
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
                        <input type="text" name="comment_sujet" id="comment_sujet2" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                    </div>
                    <div class="mb-4">
                        <label for="comment_message" class="block text-gray-700 text-sm font-bold mb-2">Votre commentaire:</label>
                        <textarea name="comment_message" id="comment_message2" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline h-24 resize-none" required></textarea>
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

<?php include "../../frontend/view/components/_footer.html.php"; ?>
<script src="../../frontend/assets/js/script.js"></script>

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

    document.querySelector('.arrow-nav.left').addEventListener('click', function(e) {
        e.preventDefault();
        const href = this.href;
        document.body.classList.add('page-turn-left');
        setTimeout(function() {
            window.location = href;
        }, 1000); // Match animation duration
    });
</script>
</body>
</html>
