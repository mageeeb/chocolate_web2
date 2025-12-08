<!-- NAVBAR FLOTANTE -->
<nav id="navbar-img" aria-label="Navigation Principale" class="fixed bottom-6 left-1/2 -translate-x-1/2 z-50">
    <div
        class="bg-[rgba(255,255,255,0.1)] bg-opacity-25 backdrop-blur-md border border-[rgba(255,255,255,0.2)] rounded-2xl px-6 py-3 shadow-2xl">
        <ul class="flex items-center gap-2 md:gap-8 text-xs">
            <!-- Accueil -->
            <li>
                <button data-section="home" onclick="window.location.href= './'"
                    class="relative flex items-center gap-2 px-3 py-2 rounded-xl transition-colors">
                    <!-- Icône Accueil -->
                    <svg class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 12L12 5l9 7" />
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M5 10v8a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2v-8" />
                    </svg>
                    <span class="hidden md:inline">Accueil</span>
                </button>
            </li>

            <!-- Recettes -->
            <li class="relative group">
                <button data-section="recipes-section"
                    onclick="const recipes = document.getElementById('recipes-section'); if(recipes) { recipes.scrollIntoView({ behavior: 'smooth', block: 'start' }); } else { window.location.href = './#recipes-section'; }"
                    class="relative flex items-center gap-2 px-3 py-2 rounded-xl transition-colors">
                    <!-- Icône Recettes -->
                    <svg class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M4 19.5V7a2 2 0 0 1 2-2h11a2 2 0 0 1 2 2v12.5" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 19.5A2.5 2.5 0 0 0 6.5 22H19" />
                        <line x1="8" y1="6.5" x2="8" y2="19" />
                        <line x1="12" y1="10" x2="16" y2="10" />
                        <line x1="12" y1="14" x2="16" y2="14" />
                    </svg>
                    <span class="hidden md:inline">Recettes</span>
                    <!-- Petite flèche -->
                    <svg class="ml-1 h-3 w-3" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 16 16">
                        <path d="M4 10l4-4 4 4" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </button>
                <!-- Dropup -->
                <div
                    class="absolute left-1/2 -translate-x-1/2 bottom-full min-w-[170px] bg-white/80 shadow-xl rounded-xl border border-[rgba(77,44,22,0.20)] z-50 opacity-0 pointer-events-none group-hover:opacity-100 group-hover:pointer-events-auto transition">
                    <ul class="py-2 text-[#4d2c16] text-sm">
                        <?php
                        try {
                            $recipesManager = new \model\manager\RecipesManager($connectPDO);
                            $allRecipes = $recipesManager->getAllRecipes();

                            $groupedRecipes = [];
                            foreach ($allRecipes as $recipe) {
                                // On utilise getUser() pour obtenir l'objet UserMapping, puis getUserName()
                                $authorName = $recipe->getUser()->getUserName();
                                if (!isset($groupedRecipes[$authorName])) {
                                    $groupedRecipes[$authorName] = [];
                                }
                                $groupedRecipes[$authorName][] = $recipe;
                            }

                            if (!empty($groupedRecipes)) {
                                foreach ($groupedRecipes as $author => $authorRecipes) {
                                    echo '<li class="px-4 py-1 font-bold mt-1">' . htmlspecialchars($author) . '</li>';
                                    foreach ($authorRecipes as $recipe) {
                                        echo '<li>';
                                        echo '<a href="?pg=recette&slug=' . htmlspecialchars($recipe->getRecipeSlug()) . '" class="block px-4 text-xs py-1 hover:bg-[#fbe7cd] rounded">';
                                        echo htmlspecialchars($recipe->getRecipeTitle());
                                        echo '</a>';
                                        echo '</li>';
                                    }
                                }
                            } else {
                                echo '<li class="px-4 py-1">Aucune recette trouvée.</li>';
                            }
                        } catch (Exception $e) {
                            // En cas d'erreur on affiche un message
                            echo '<li class="px-4 py-1">Erreur lors du chargement des recettes : ' . $e->getMessage() . '</li>';
                        }
                        ?>
                    </ul>
                </div>
            </li>

            <!-- Catégories -->
            <li>
                <button data-section="contact-section"
                    onclick="const contact = document.getElementById('contact-section'); if(contact) { contact.scrollIntoView({behavior:'smooth', block:'start'}); } else { window.location.href = './#contact-section'; }"
                    class="relative flex items-center gap-2 px-3 py-2 rounded-xl transition-colors">
                    <!-- Icône Contact -->
                    <svg class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <rect x="3" y="5" width="18" height="14" rx="2" />
                        <polyline points="3 7 12 13 21 7" />
                    </svg>
                    <span class="hidden md:inline">Contact</span>
                </button>
            </li>
            <li>
                <!--Icône Category-->
                <button onclick="window.location.href= '?pg=categories' "
                    class="relative flex items-center gap-2 px-3 py-2 rounded-xl transition-colors">
                    <svg class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <rect x="3" y="3" width="7" height="7" />
                        <rect x="14" y="3" width="7" height="7" />
                        <rect x="14" y="14" width="7" height="7" />
                        <rect x="3" y="14" width="7" height="7" />
                    </svg>
                    <span class="hidden md:inline">Category</span>
            </li>

            <!-- About -->
            <li>
                <button onclick="window.location.href = '?pg=about'"
                    class="relative flex items-center gap-2 px- py-2 rounded-xl transition-colors">
                    <!-- Icône About -->
                    <svg class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <circle cx="12" cy="12" r="10" />
                        <line x1="12" y1="8" x2="12" y2="12" />
                        <circle cx="12" cy="16" r="1" />
                    </svg>
                    <span class="hidden md:inline">About</span>
                </button>
            </li>

            <!-- Connexion -->
            <li>
                <?php if (isset($_SESSION["users_id"])): ?>
                    <form method="post" action="?pg=logout" style="display: inline;">
                        <button type="submit"
                            class="relative flex items-center gap-2 px-3 py-2 rounded-xl transition-colors">
                            <!-- Icône Déconnexion -->
                            <svg class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path d="M9 16l-4-4 4-4" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M5 12h12" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M17 5v14" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                            <span class="hidden md:inline">Déconnexion</span>
                        </button>
                    </form>
                <?php else: ?>
                    <button onclick="window.location.href = '?pg=login'"
                        class="relative flex items-center gap-2 px-3 py-2 rounded-xl transition-colors">
                        <!-- Icône Connexion -->
                        <svg class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <circle cx="12" cy="8" r="4" />
                            <path d="M4 20c0-4 16-4 16 0" />
                        </svg>
                        <span class="hidden md:inline">Connexion</span>
                    </button>
                <?php endif; ?>
            </li>
        </ul>
    </div>
</nav>