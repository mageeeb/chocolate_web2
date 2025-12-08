<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Mousse au Chocolat - Chocolat Hub</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="../../css/style.css" />
    <link
      rel="icon"
      href="../../images/tablette_chocolat1.ico"
      type="image/png"
    />
    <style>
      .line-through {
        text-decoration: line-through;
      }
      .ingredient-item {
        transition: opacity 0.3s ease;
      }
    </style>
  </head>
  <body class="bg-[#f7efe6]">
    <section class="pt-32 pb-24 min-h-screen">
      <div class="max-w-7xl mx-auto px-6">
        <!-- En-tête de la recette -->
        <div class="text-center mb-12">
          <h1 class="text-5xl font-bold text-[#4d2c16] mb-4">
            Mousse au Chocolat au Lait Aérien
          </h1>
          <p class="text-xl text-[#4d2c16]/80">
            Une texture légère et mousseuse qui fond en bouche, avec une douceur
            équilibrée par la richesse du chocolat au lait. Parfait pour une fin
            de repas gourmande ou une pause sucrée.
          </p>
          <div
            class="flex justify-center items-center gap-6 mt-6 text-[#4d2c16]/70"
          >
            <span class="flex items-center gap-2">
              <svg
                class="h-5 w-5"
                fill="none"
                stroke="currentColor"
                viewBox="0 0 24 24"
              >
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"
                />
              </svg>
              30 min
            </span>
            <span class="flex items-center gap-2">
              <svg
                class="h-5 w-5"
                fill="none"
                stroke="currentColor"
                viewBox="0 0 24 24"
              >
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"
                />
              </svg>
              <span id="servings-display">4</span> personnes
            </span>
            <span class="flex items-center gap-2">
              <svg
                class="h-5 w-5"
                fill="none"
                stroke="currentColor"
                viewBox="0 0 24 24"
              >
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"
                />
              </svg>
              Facile
            </span>
          </div>

          <div class="w-full my-8 rounded-2xl overflow-hidden shadow-lg">
            <img
              src="../../frontend/assets/images/<?= htmlspecialchars($recette->getRecipeImg()) ?>"
              class="w-full h-auto object-cover"
              alt="Mousse au Chocolat au Lait"
            />
          </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
          <!-- Colonne des ingrédients avec calculateur -->
          <div class="lg:col-span-1">
            <div class="bg-white p-8 rounded-2xl shadow-xl sticky top-24">
              <h2 class="text-2xl font-semibold text-[#4d2c16] mb-6">
                Ingrédients
              </h2>

              <!-- Calculateur de portions -->
              <div class="bg-[#f9bf29]/10 p-4 rounded-lg mb-6">
                <p class="text-sm text-[#4d2c16]/70 mb-3">
                  Nombre de personnes:
                </p>
                <div class="flex items-center justify-center gap-4">
                  <button
                    id="decrease-btn"
                    class="w-10 h-10 bg-[#f9bf29] text-[#4d2c16] rounded-full font-bold hover:bg-[#ffcb3b] transition"
                  >
                    -
                  </button>
                  <span
                    id="servings"
                    class="text-3xl font-bold text-[#4d2c16] w-12 text-center"
                    >4</span
                  >
                  <button
                    id="increase-btn"
                    class="w-10 h-10 bg-[#f9bf29] text-[#4d2c16] rounded-full font-bold hover:bg-[#ffcb3b] transition"
                  >
                    +
                  </button>
                </div>
              </div>

              <!-- Liste des ingrédients -->
              <ul class="space-y-3 text-[#4d2c16]">
                <li
                  class="flex justify-between border-b border-gray-200 pb-2 ingredient-item opacity-100"
                >
                  <span class="ingredient-name">Chocolat au lait</span>
                  <span class="font-semibold"
                    ><span class="ingredient" data-base="200">200</span>g</span
                  >
                </li>
                <li
                  class="flex justify-between border-b border-gray-200 pb-2 ingredient-item opacity-100"
                >
                  <span class="ingredient-name">Œufs (blancs)</span>
                  <span class="font-semibold"
                    ><span class="ingredient" data-base="4">4</span></span
                  >
                </li>
                <li
                  class="flex justify-between border-b border-gray-200 pb-2 ingredient-item opacity-100"
                >
                  <span class="ingredient-name">Œufs (jaunes)</span>
                  <span class="font-semibold"
                    ><span class="ingredient" data-base="3">3</span></span
                  >
                </li>
                <li
                  class="flex justify-between border-b border-gray-200 pb-2 ingredient-item opacity-100"
                >
                  <span class="ingredient-name">Sucre</span>
                  <span class="font-semibold"
                    ><span class="ingredient" data-base="40">40</span>g</span
                  >
                </li>
                <li
                  class="flex justify-between border-b border-gray-200 pb-2 ingredient-item opacity-100"
                >
                  <span class="ingredient-name">Beurre</span>
                  <span class="font-semibold"
                    ><span class="ingredient" data-base="30">30</span>g</span
                  >
                </li>
                <li
                  class="flex justify-between border-b border-gray-200 pb-2 ingredient-item opacity-100"
                >
                  <span class="ingredient-name">Crème liquide</span>
                  <span class="font-semibold"
                    ><span class="ingredient" data-base="200">200</span>ml</span
                  >
                </li>
                <li
                  class="flex justify-between pb-2 ingredient-item opacity-100"
                >
                  <span class="ingredient-name">Pincée de sel</span>
                  <span class="font-semibold">1</span>
                </li>
              </ul>

              <button
                class="w-full mt-6 bg-[#4d2c16] text-[#f7efe6] py-3 rounded-lg hover:bg-[#4d2c16]/90 transition font-semibold"
              >
                Imprimer la recette
              </button>
            </div>
          </div>

          <!-- Colonne des étapes -->
          <div class="lg:col-span-2">
            <div class="bg-white p-8 rounded-2xl shadow-xl">
              <h2 class="text-2xl font-semibold text-[#4d2c16] mb-6">
                Préparation
              </h2>

              <div class="space-y-6">
                <!-- Étape 1 -->
                <div class="flex gap-4 group" data-step="step1">
                  <div class="flex-shrink-0">
                    <input
                      type="checkbox"
                      id="step1"
                      class="step-checkbox w-6 h-6 rounded border-2 border-[#f9bf29] text-[#f9bf29] focus:ring-[#f9bf29] cursor-pointer"
                    />
                  </div>
                  <div class="flex-1">
                    <label for="step1" class="cursor-pointer">
                      <div class="flex items-start gap-3">
                        <span
                          class="flex-shrink-0 w-8 h-8 bg-[#f9bf29] text-[#4d2c16] rounded-full flex items-center justify-center font-bold text-sm"
                          >1</span
                        >
                        <div class="flex-1">
                          <h3 class="font-semibold text-[#4d2c16] mb-2">
                            Faire fondre le chocolat
                          </h3>
                          <p class="text-[#4d2c16]/70">
                            Cassez le chocolat en morceaux et faites-le fondre
                            au bain-marie avec le beurre. Mélangez jusqu'à
                            obtenir une texture lisse et homogène. Laissez
                            tiédir.
                          </p>
                        </div>
                      </div>
                    </label>
                  </div>
                </div>

                <!-- Étape 2 -->
                <div class="flex gap-4 group" data-step="step2">
                  <div class="flex-shrink-0">
                    <input
                      type="checkbox"
                      id="step2"
                      class="step-checkbox w-6 h-6 rounded border-2 border-[#f9bf29] text-[#f9bf29] focus:ring-[#f9bf29] cursor-pointer"
                    />
                  </div>
                  <div class="flex-1">
                    <label for="step2" class="cursor-pointer">
                      <div class="flex items-start gap-3">
                        <span
                          class="flex-shrink-0 w-8 h-8 bg-[#f9bf29] text-[#4d2c16] rounded-full flex items-center justify-center font-bold text-sm"
                          >2</span
                        >
                        <div class="flex-1">
                          <h3 class="font-semibold text-[#4d2c16] mb-2">
                            Séparer les blancs des jaunes
                          </h3>
                          <p class="text-[#4d2c16]/70">
                            Séparez les blancs d'œufs des jaunes. Réservez les
                            blancs dans un saladier bien propre et sec. Mettez
                            les jaunes de côté.
                          </p>
                        </div>
                      </div>
                    </label>
                  </div>
                </div>

                <!-- Étape 3 -->
                <div class="flex gap-4 group" data-step="step3">
                  <div class="flex-shrink-0">
                    <input
                      type="checkbox"
                      id="step3"
                      class="step-checkbox w-6 h-6 rounded border-2 border-[#f9bf29] text-[#f9bf29] focus:ring-[#f9bf29] cursor-pointer"
                    />
                  </div>
                  <div class="flex-1">
                    <label for="step3" class="cursor-pointer">
                      <div class="flex items-start gap-3">
                        <span
                          class="flex-shrink-0 w-8 h-8 bg-[#f9bf29] text-[#4d2c16] rounded-full flex items-center justify-center font-bold text-sm"
                          >3</span
                        >
                        <div class="flex-1">
                          <h3 class="font-semibold text-[#4d2c16] mb-2">
                            Incorporer les jaunes
                          </h3>
                          <p class="text-[#4d2c16]/70">
                            Ajoutez les jaunes d'œufs un par un au chocolat
                            fondu et tiède. Mélangez bien entre chaque ajout
                            pour obtenir une préparation brillante et homogène.
                          </p>
                        </div>
                      </div>
                    </label>
                  </div>
                </div>

                <!-- Étape 4 -->
                <div class="flex gap-4 group" data-step="step4">
                  <div class="flex-shrink-0">
                    <input
                      type="checkbox"
                      id="step4"
                      class="step-checkbox w-6 h-6 rounded border-2 border-[#f9bf29] text-[#f9bf29] focus:ring-[#f9bf29] cursor-pointer"
                    />
                  </div>
                  <div class="flex-1">
                    <label for="step4" class="cursor-pointer">
                      <div class="flex items-start gap-3">
                        <span
                          class="flex-shrink-0 w-8 h-8 bg-[#f9bf29] text-[#4d2c16] rounded-full flex items-center justify-center font-bold text-sm"
                          >4</span
                        >
                        <div class="flex-1">
                          <h3 class="font-semibold text-[#4d2c16] mb-2">
                            Monter les blancs en neige
                          </h3>
                          <p class="text-[#4d2c16]/70">
                            Ajoutez une pincée de sel aux blancs d'œufs et
                            montez-les en neige ferme. Lorsqu'ils commencent à
                            mousser, ajoutez le sucre progressivement et
                            continuez à battre jusqu'à obtenir des blancs bien
                            fermes et brillants.
                          </p>
                        </div>
                      </div>
                    </label>
                  </div>
                </div>

                <!-- Étape 5 -->
                <div class="flex gap-4 group" data-step="step5">
                  <div class="flex-shrink-0">
                    <input
                      type="checkbox"
                      id="step5"
                      class="step-checkbox w-6 h-6 rounded border-2 border-[#f9bf29] text-[#f9bf29] focus:ring-[#f9bf29] cursor-pointer"
                    />
                  </div>
                  <div class="flex-1">
                    <label for="step5" class="cursor-pointer">
                      <div class="flex items-start gap-3">
                        <span
                          class="flex-shrink-0 w-8 h-8 bg-[#f9bf29] text-[#4d2c16] rounded-full flex items-center justify-center font-bold text-sm"
                          >5</span
                        >
                        <div class="flex-1">
                          <h3 class="font-semibold text-[#4d2c16] mb-2">
                            Incorporer délicatement les blancs
                          </h3>
                          <p class="text-[#4d2c16]/70">
                            Incorporez délicatement les blancs en neige au
                            mélange chocolat-jaunes en trois fois, en soulevant
                            la masse avec une spatule de bas en haut pour ne pas
                            casser les blancs. Faites des mouvements doux et
                            enveloppants.
                          </p>
                        </div>
                      </div>
                    </label>
                  </div>
                </div>

                <!-- Étape 6 -->
                <div class="flex gap-4 group" data-step="step6">
                  <div class="flex-shrink-0">
                    <input
                      type="checkbox"
                      id="step6"
                      class="step-checkbox w-6 h-6 rounded border-2 border-[#f9bf29] text-[#f9bf29] focus:ring-[#f9bf29] cursor-pointer"
                    />
                  </div>
                  <div class="flex-1">
                    <label for="step6" class="cursor-pointer">
                      <div class="flex items-start gap-3">
                        <span
                          class="flex-shrink-0 w-8 h-8 bg-[#f9bf29] text-[#4d2c16] rounded-full flex items-center justify-center font-bold text-sm"
                          >6</span
                        >
                        <div class="flex-1">
                          <h3 class="font-semibold text-[#4d2c16] mb-2">
                            Monter la crème chantilly
                          </h3>
                          <p class="text-[#4d2c16]/70">
                            Montez la crème liquide bien froide en chantilly
                            ferme. Incorporez-la délicatement à la préparation
                            en effectuant les mêmes mouvements enveloppants.
                          </p>
                        </div>
                      </div>
                    </label>
                  </div>
                </div>

                <!-- Étape 7 -->
                <div class="flex gap-4 group" data-step="step7">
                  <div class="flex-shrink-0">
                    <input
                      type="checkbox"
                      id="step7"
                      class="step-checkbox w-6 h-6 rounded border-2 border-[#f9bf29] text-[#f9bf29] focus:ring-[#f9bf29] cursor-pointer"
                    />
                  </div>
                  <div class="flex-1">
                    <label for="step7" class="cursor-pointer">
                      <div class="flex items-start gap-3">
                        <span
                          class="flex-shrink-0 w-8 h-8 bg-[#f9bf29] text-[#4d2c16] rounded-full flex items-center justify-center font-bold text-sm"
                          >7</span
                        >
                        <div class="flex-1">
                          <h3 class="font-semibold text-[#4d2c16] mb-2">
                            Répartir et réfrigérer
                          </h3>
                          <p class="text-[#4d2c16]/70">
                            Répartissez la mousse dans des verrines ou des
                            ramequins. Placez au réfrigérateur pendant au moins
                            3 heures avant de servir. Vous pouvez décorer avec
                            des copeaux de chocolat ou de la chantilly.
                          </p>
                        </div>
                      </div>
                    </label>
                  </div>
                </div>
              </div>

              <!-- Barre de progression -->
              <div class="mt-8 p-6 bg-[#f9bf29]/10 rounded-lg">
                <div class="flex justify-between items-center mb-2">
                  <span class="text-sm font-semibold text-[#4d2c16]"
                    >Progression</span
                  >
                  <span class="text-sm font-semibold text-[#4d2c16]"
                    ><span id="progress-text">0</span>/7 étapes</span
                  >
                </div>
                <div class="w-full bg-gray-200 rounded-full h-3">
                  <div
                    id="progress-bar"
                    class="bg-[#f9bf29] h-3 rounded-full transition-all duration-300"
                    style="width: 0%"
                  ></div>
                </div>
              </div>
            </div>

            <!-- Conseils du chef -->
            <div class="bg-white p-8 rounded-2xl shadow-xl mt-8">
              <h2
                class="text-2xl font-semibold text-[#4d2c16] mb-4 flex items-center gap-2"
              >
                <svg
                  class="h-6 w-6 text-[#f9bf29]"
                  fill="none"
                  stroke="currentColor"
                  viewBox="0 0 24 24"
                >
                  <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"
                  />
                </svg>
                Conseils du chef
              </h2>
              <ul class="space-y-3 text-[#4d2c16]/70">
                <li class="flex gap-3">
                  <span class="text-[#f9bf29] font-bold">•</span>
                  <span
                    >Assurez-vous que le chocolat ne soit pas trop chaud avant
                    d'incorporer les jaunes, sinon ils risquent de cuire.</span
                  >
                </li>
                <li class="flex gap-3">
                  <span class="text-[#f9bf29] font-bold">•</span>
                  <span
                    >Pour des blancs en neige parfaits, utilisez des œufs à
                    température ambiante et un saladier parfaitement
                    propre.</span
                  >
                </li>
                <li class="flex gap-3">
                  <span class="text-[#f9bf29] font-bold">•</span>
                  <span
                    >La mousse se conserve 2-3 jours au réfrigérateur. Elle peut
                    même être préparée la veille.</span
                  >
                </li>
                <li class="flex gap-3">
                  <span class="text-[#f9bf29] font-bold">•</span>
                  <span
                    >Pour une version encore plus gourmande, ajoutez une
                    cuillère de café soluble au chocolat fondu.</span
                  >
                </li>
              </ul>
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

    <!-- Navigation inférieure -->
    <?php include "../../frontend/view/components/_menu.html.php"; ?>
    <!-- Footer -->
    <?php include "../../frontend/view/components/_footer.html.php"; ?>

    <script>
      // === 1. Calculateur de portions ===
      let servings = 4;
      const servingsDisplay = document.getElementById("servings");
      const servingsDisplayTop = document.getElementById("servings-display");
      const ingredients = document.querySelectorAll(".ingredient");

      document.getElementById("increase-btn").addEventListener("click", () => {
        servings++;
        updateIngredients();
      });

      document.getElementById("decrease-btn").addEventListener("click", () => {
        if (servings > 1) {
          servings--;
          updateIngredients();
        }
      });

      function updateIngredients() {
        servingsDisplay.textContent = servings;
        servingsDisplayTop.textContent = servings;

        ingredients.forEach((ingredient) => {
          const base = parseFloat(ingredient.dataset.base);
          const newValue = (base / 4) * servings;
          const formattedValue = Number.isInteger(newValue)
            ? newValue
            : Math.round(newValue * 10) / 10;
          ingredient.textContent = formattedValue;
        });
      }

      // === 2. Lien entre les étapes et les ingrédients ===
      const stepIngredients = {
        step1: ["Chocolat au lait", "Beurre"],
        step2: ["Œufs (blancs)", "Œufs (jaunes)"],
        step3: ["Œufs (jaunes)"],
        step4: ["Œufs (blancs)", "Sucre", "Pincée de sel"],
        step5: [],
        step6: ["Crème liquide"],
        step7: [],
      };

      // === 3. Progression et cases à cocher ===
      const stepCheckboxes = document.querySelectorAll(".step-checkbox");
      const progressBar = document.getElementById("progress-bar");
      const progressText = document.getElementById("progress-text");
      const totalSteps = stepCheckboxes.length;

      function updateProgress() {
        const checkedSteps = Array.from(stepCheckboxes).filter(
          (cb) => cb.checked
        ).length;
        const progressPercentage = (checkedSteps / totalSteps) * 100;

        progressBar.style.width = `${progressPercentage}%`;
        progressText.textContent = checkedSteps;

        updateUsedIngredients();
        saveProgress();
      }

      function updateUsedIngredients() {
        const usedIngredients = new Set();

        stepCheckboxes.forEach((checkbox) => {
          if (checkbox.checked) {
            const stepId = checkbox.id;
            (stepIngredients[stepId] || []).forEach((ing) =>
              usedIngredients.add(ing)
            );
          }
        });

        document.querySelectorAll(".ingredient-item").forEach((item) => {
          const name = item
            .querySelector(".ingredient-name")
            .textContent.trim();
          if (usedIngredients.has(name)) {
            item.classList.add("opacity-30", "line-through");
            item.classList.remove("opacity-100");
          } else {
            item.classList.remove("opacity-30", "line-through");
            item.classList.add("opacity-100");
          }
        });
      }

      // === 4. Visual highlighting of steps ===
      stepCheckboxes.forEach((checkbox) => {
        checkbox.addEventListener("change", function () {
          const stepContainer = this.closest(".group");
          const label = stepContainer.querySelector("label");
          const title = stepContainer.querySelector("h3");

          if (this.checked) {
            label.classList.add("line-through", "opacity-50");
            title.classList.add("text-[#f9bf29]");
          } else {
            label.classList.remove("line-through", "opacity-50");
            title.classList.remove("text-[#f9bf29]");
          }

          updateProgress();
        });
      });

      // === 5. Sauvegarde du progrès ===
      function saveProgress() {
        const progress = {};
        stepCheckboxes.forEach((cb) => {
          progress[cb.id] = cb.checked;
        });
        localStorage.setItem(
          "mousse-au-chocolat-progress",
          JSON.stringify(progress)
        );
      }

      function loadProgress() {
        const saved = localStorage.getItem("mousse-au-chocolat-progress");
        if (saved) {
          const progress = JSON.parse(saved);
          stepCheckboxes.forEach((cb) => {
            if (progress[cb.id]) {
              cb.checked = true;
              cb.dispatchEvent(new Event("change"));
            }
          });
          updateProgress();
        }
      }

      // === 6. Initialisation ===
      updateIngredients();
      loadProgress();

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
