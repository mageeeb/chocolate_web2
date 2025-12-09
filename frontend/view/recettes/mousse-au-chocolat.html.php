<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../../frontend/view/recettes/Sola/style/style.css" />
    <link rel="icon" href="../../frontend/assets/images/tablette_chocolat1.ico" type="image/png" />
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <title>Recettes : Mousse au chocolat</title>
  </head>
  <body class="bg-[#f7efe6]">
    <main
      class="bg-[#f7efe6] text-[#4d2c16] min-h-screen w-screen md:grid md:grid-cols-2 gap-10 place-items-center p-8 md:px-20"
    >
      <!-- NAVBAR FLOTANTE -->
      <?php include "../../frontend/view/components/_menu.html.php"; ?>
      <div class="w-full h-full rounded-lg">
        <img
          class="object-cover rounded-lg"
          src="../../frontend/assets/images/<?= htmlspecialchars($recette->getRecipeImg()) ?>"
          alt="image de mousse au chocolat"
        />
      </div>
      <section class="grid md:grid-rows-2">
        <div class="[&_span]:font-black col-start-2 row-start-1 pb-24">
          <p class="text-md py-8">· Mousse au chocolat ·</p>
          <h1 class="text-5xl pb-8 underline underline-offset-3">
            <span>Minimaliste</span>, simple, <br />
            douce,<span> efficace</span>.
          </h1>
          <p>
            Une mousse au chocolat, c’est un peu comme un bon design :
            <span>minimaliste, mais chaque détail compte</span>. Trois
            ingrédients, quelques gestes précis, et la magie opère. Cette
            recette, c’est celle que je fais quand j’ai besoin de plonger dans
            quelque chose de plus… <span>sensoriel</span>.
          </p>
        </div>
        <div
          class="border-2 border-[#4d2c16] rounded-md p-8 text-md col-start-2 row-start-2 h-fit w-full [&_span]:font-black [&_p]:mb-2"
        >
          <h2 class="py-5">Ingrédients (pour 4 personnes) :</h2>
          <p>- 200 g de chocolat noir (70 % minimum, c’est lui la star)</p>
          <p>- 6 œufs frais (jaunes et blancs séparés)</p>
          <p>- 1 pincée de sel</p>
          <p>
            - (optionnel) un filet de café noir ou une pointe de vanille pour la
            profondeur
          </p>
        </div>
      </section>
    </main>

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
