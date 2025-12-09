<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" href="images/tablette_chocolat1.ico" type="image/png" />
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="../../frontend/view/recettes/Sola/style/style.css" />
    <link href="https://fonts.googleapis.com/css2?family=Reenie+Beanie&display=swap" rel="stylesheet">
  </head>
  <body class="bg-[#FFE7C9]">
    <main
      class="bg-[#FFE7C9] text-[#442E28] min-h-screen w-screen md:grid md:grid-cols-2 md:grid-rows-3 gap-10 md:place-items-center p-8 md:px-20"
    >
      <!-- NAVBAR FLOTANTE -->
      <?php include "../../frontend/view/components/_menu.html.php"; ?>
      <div class="col-span-2 text-center">
        <h1 class="text-center text-4xl md:text-7xl uppercase">
          Les brownies <br />
          de ma grand-mère.
        </h1>
        <p class="py-10 text-sm">
          Il y a des recettes qui ressemblent à des souvenirs. <br /> Ce brownie
          granulé de ma grand-mère, c’est exactement ça : <br />
          un dessert qui fait du bruit quand on croque dedans, <br />
          qui sent le chocolat chaud dans toute la cuisine et qui a ce petit
          côté imparfait… <br />
          mais terriblement rassurant.
        </p>
      </div>
      <!-- Ingredients -->
      <div
        class="col-span-2 row-start-2 md:flex items-center gap-10 relative h-80 md:py-24"
      >
        <img src="../../frontend/assets/images/image3.png" alt="" />
        <!-- Divider -->
        <div class="bg-[#442E28] h-[0.7px] w-24 md:mb-62"></div>

        <ul class="list-disc relative mb-20">
          <li>200 g de chocolat noir</li>
          <li>120 g de beurre</li>
          <li>150 g de sucre</li>
          <li>100 g de farine</li>
          <li>2 oeufs</li>
          <li>1 c. à s. de cacao en poudre non sucré</li>
          <li>1 pincée de sel</li>
          <li>
            1 poignée de pépites de chocolat (facultatif… mais recommandé)
          </li>
        </ul>
      </div>
      <!-- Preparation -->
      <section
        class="col-span-2 grid grid-cols-2 gap-20 items-center bg-[#442E28] text-[#FFE7C9] [&_p]:text-sm [&_span]:font-bold p-10 w-full rounded-lg"
      >
        <div class="[&_p]:pb-6">
          <p>Étapes :</p>
          <p>
            <span>1. Fonds le chocolat et le beurre. </span><br />
            Laisse-les se mêler doucement, comme deux idées qui finissent par
            faire sens quand tu codes.
          </p>
          <p>
            <span>2. Ajoute le sucre et les œufs. </span><br />
            Mélange sans fouetter : on cherche la densité, pas l’aération. Ce
            brownie aime rester lui-même, solide et un peu brut.
          </p>
          <p>
            <span>3. Incorpore la farine, le cacao et le sel. </span><br />
            C’est le moment où la pâte devient réelle, cohérente — un peu comme
            le moment où ton prototype prend forme.
          </p>
          <p>
            <span>4. Ajoute le “granulé”.</span> <br />
            Noisettes concassées, pépites de chocolat, ou même un mélange
            maison. C’est ta touche perso, celle qui fait que personne d’autre
            ne le fait exactement comme toi.
          </p>
          <p>
            <span>5. Cuisson.</span> <br />
            20 à 25 minutes à 180°C.
          </p>
          <p class="text-xs italic">
            Le secret : ne pas trop cuire. <br />
            Le centre doit rester tendre, presque timide.
          </p>
        </div>
        <div>
          <h1 class="md:text-5xl md:uppercase text-center pb-5">
            Les brownies <br />
            de ma grand-mère
          </h1>
          <p class="text-center text-sm mb-10">Par Sola Kabuta</p>
          <!-- Preparation Info -->
          <section class="flex gap-10 justify-center pb-10">
            <div class="flex gap-2 items-center">
              <svg
                width="24"
                height="24"
                viewBox="0 0 24 24"
                fill="none"
                xmlns="http://www.w3.org/2000/svg"
              >
                <path
                  d="M5 3L2 6M22 6L19 3M6 19L4 21M18 19L20 21M12 9V13L14 15M12 21C14.1217 21 16.1566 20.1571 17.6569 18.6569C19.1571 17.1566 20 15.1217 20 13C20 10.8783 19.1571 8.84344 17.6569 7.34315C16.1566 5.84285 14.1217 5 12 5C9.87827 5 7.84344 5.84285 6.34315 7.34315C4.84285 8.84344 4 10.8783 4 13C4 15.1217 4.84285 17.1566 6.34315 18.6569C7.84344 20.1571 9.87827 21 12 21Z"
                  stroke="#FFE7C9"
                  stroke-width="2"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                />
              </svg>
              <p>15 min</p>
            </div>
            <div class="flex gap-2 items-center">
              <svg
                width="24"
                height="24"
                viewBox="0 0 24 24"
                fill="none"
                xmlns="http://www.w3.org/2000/svg"
              >
                <path
                  d="M20 21C20 19.6044 20 18.9067 19.8278 18.3389C19.44 17.0605 18.4395 16.06 17.1611 15.6722C16.5933 15.5 15.8956 15.5 14.5 15.5H9.5C8.10444 15.5 7.40665 15.5 6.83886 15.6722C5.56045 16.06 4.56004 17.0605 4.17224 18.3389C4 18.9067 4 19.6044 4 21M16.5 7.5C16.5 9.98528 14.4853 12 12 12C9.51472 12 7.5 9.98528 7.5 7.5C7.5 5.01472 9.51472 3 12 3C14.4853 3 16.5 5.01472 16.5 7.5Z"
                  stroke="#FFE7C9"
                  stroke-width="2"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                />
              </svg>
              <p>4 personnes</p>
            </div>
            <div class="flex gap-2 items-center">
              <svg
                width="24"
                height="24"
                viewBox="0 0 24 24"
                fill="none"
                xmlns="http://www.w3.org/2000/svg"
              >
                <path
                  d="M16.1111 3C19.6333 3 22 6.3525 22 9.48C22 15.8138 12.1778 21 12 21C11.8222 21 2 15.8138 2 9.48C2 6.3525 4.36667 3 7.88889 3C9.91111 3 11.2333 4.02375 12 4.92375C12.7667 4.02375 14.0889 3 16.1111 3Z"
                  stroke="#FFE7C9"
                  stroke-width="2"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                />
              </svg>
              <p>48</p>
            </div>
            <div class="flex gap-2 items-center">
              <svg
                width="24"
                height="24"
                viewBox="0 0 24 24"
                fill="none"
                xmlns="http://www.w3.org/2000/svg"
              >
                <path
                  d="M11.2827 3.45332C11.5131 2.98638 11.6284 2.75291 11.7848 2.67831C11.9209 2.61341 12.0791 2.61341 12.2152 2.67831C12.3717 2.75291 12.4869 2.98638 12.7174 3.45332L14.9041 7.88328C14.9721 8.02113 15.0061 8.09006 15.0558 8.14358C15.0999 8.19096 15.1527 8.22935 15.2113 8.25662C15.2776 8.28742 15.3536 8.29854 15.5057 8.32077L20.397 9.03571C20.9121 9.11099 21.1696 9.14863 21.2888 9.27444C21.3925 9.38389 21.4412 9.5343 21.4215 9.68377C21.3988 9.85558 21.2124 10.0372 20.8395 10.4004L17.3014 13.8464C17.1912 13.9538 17.136 14.0076 17.1004 14.0715C17.0689 14.128 17.0487 14.1902 17.0409 14.2545C17.0321 14.3271 17.0451 14.403 17.0711 14.5547L17.906 19.4221C17.994 19.9355 18.038 20.1922 17.9553 20.3445C17.8833 20.477 17.7554 20.57 17.6071 20.5975C17.4366 20.6291 17.2061 20.5078 16.7451 20.2654L12.3724 17.9658C12.2361 17.8942 12.168 17.8584 12.0962 17.8443C12.0327 17.8318 11.9673 17.8318 11.9038 17.8443C11.832 17.8584 11.7639 17.8942 11.6277 17.9658L7.25492 20.2654C6.79392 20.5078 6.56341 20.6291 6.39297 20.5975C6.24468 20.57 6.11672 20.477 6.04474 20.3445C5.962 20.1922 6.00603 19.9355 6.09407 19.4221L6.92889 14.5547C6.95491 14.403 6.96793 14.3271 6.95912 14.2545C6.95132 14.1902 6.93111 14.128 6.89961 14.0715C6.86402 14.0076 6.80888 13.9538 6.69859 13.8464L3.16056 10.4004C2.78766 10.0372 2.60121 9.85558 2.57853 9.68377C2.55879 9.5343 2.60755 9.38389 2.71125 9.27444C2.83044 9.14863 3.08797 9.11099 3.60304 9.03571L8.49431 8.32077C8.64642 8.29854 8.72248 8.28742 8.78872 8.25662C8.84736 8.22935 8.90016 8.19096 8.94419 8.14358C8.99391 8.09006 9.02793 8.02113 9.09597 7.88328L11.2827 3.45332Z"
                  stroke="#FFE7C9"
                  stroke-width="2"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                />
              </svg>
              <p>4,8</p>
            </div>
          </section>
          <!-- Graphic -->
          <section
            class="bg-[#FF8C00] text-[#442E28] w-full rounded-lg p-4 items-center gap-5"
          >
            <div class="flex align-items gap-1 uppercase flex-col">
              <div class="relative flex items-center gap-5">
                <p>Difficulté</p>
                <div class="h-[0.8px] w-full bg-[#442E28] rounded-lg"></div>
              </div>
              <div class="relative flex items-center gap-5">
                <p>Sucre</p>
                <div class="h-[0.8px] w-full bg-[#442E28] rounded-lg"></div>
              </div>
              <div class="relative flex items-center gap-5">
                <p>Plaisir</p>
                <div class="h-[0.8px] w-full bg-[#442E28] rounded-lg"></div>
              </div>
            </div>
          </section>
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
