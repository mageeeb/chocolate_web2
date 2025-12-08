<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panneau d'Administration - Chocolat Hub</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="../../frontend/assets/css/style.css" />
    <!-- Import Lucide -->
    <script src="https://unpkg.com/lucide@latest"></script>
    <style>
        body {
            background-color: #f7efe6;
        }
        .tab-content {
            display: none;
        }
        .tab-content.active {
            display: block;
            animation: fadeIn 0.5s ease-in-out;
        }
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .tab-link.active {
            background-color: #4d2c16;
            color: #fff;
        }
        .table-striped tr:nth-child(even) {
            background-color: rgba(77, 44, 22, 0.05);
        }
    </style>
</head>
<body class="font-sans">

    <main>
        <?php include_once '../../frontend/view/components/_menu.html.php'; ?>
    </main>


    <div class="container mx-auto p-4 md:p-8 max-w-7xl">
        <header class="text-center my-8 md:my-12">
            <h1 class="text-5xl md:text-6xl text-[#4d2c16]">Administration</h1>
            <p class="text-[#7a3c18] mt-2">Gérez le contenu de Chocolat Hub avec facilité.</p>
        </header>

        <main class="bg-white/60 backdrop-blur-lg rounded-2xl shadow-xl p-6 md:p-8">
            <!-- Onglets de navigation -->
            <div class="mb-6">
                <nav class="flex flex-col sm:flex-row items-center justify-center sm:space-x-2 rounded-xl bg-white/50 p-2" aria-label="Tabs">
                    <button class="tab-link text-lg w-full sm:w-auto text-[#4d2c16] py-3 px-6 font-medium rounded-lg transition-all duration-300 ease-in-out active" data-tab="recettes">
                        Recettes
                    </button>
                    <button class="tab-link text-lg w-full sm:w-auto text-[#4d2c16] py-3 px-6 font-medium rounded-lg transition-all duration-300 ease-in-out" data-tab="utilisateurs">
                        Utilisateurs
                    </button>
                    <button class="tab-link text-lg w-full sm:w-auto text-[#4d2c16] py-3 px-6 font-medium rounded-lg transition-all duration-300 ease-in-out" data-tab="commentaires">
                        Commentaires
                    </button>
                    <button class="tab-link text-lg w-full sm:w-auto text-[#4d2c16] py-3 px-6 font-medium rounded-lg transition-all duration-300 ease-in-out" data-tab="notes">
                        Notes
                    </button>
                </nav>
            </div>

            <!-- Contenu des onglets -->
            <div>
                <!-- Section de gestion des recettes -->
                <div id="recettes" class="tab-content active">
                    <div class="flex justify-between items-center mb-4">
                        <h2 class="text-3xl text-[#4d2c16]">Les Recettes</h2>
                        <a href="?pg=admin&action=add_recipe" class="bg-[#4d2c16] text-white px-5 py-2.5 rounded-lg hover:bg-[#6b4a35] transition shadow-md hover:shadow-lg flex items-center gap-2">
                            <i data-lucide="plus-circle" class="w-5 h-5"></i>
                            Ajouter
                        </a>
                    </div>
                    <div class="overflow-x-auto rounded-lg border border-gray-200/50">
                        <table class="w-full table-auto text-left table-striped">
                            <thead class="bg-[#4d2c16]/10 text-[#4d2c16]">
                                <tr class="border-b-2 border-[#4d2c16]/30">
                                    <th class="px-6 py-3 font-semibold">Titre</th>
                                    <th class="px-6 py-3 font-semibold hidden md:table-cell">Auteur</th>
                                    <th class="px-6 py-3 font-semibold text-right">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="text-[#4d2c16]">
                                <?php if (isset($allRecipes) && !empty($allRecipes)): ?>
                                    <?php foreach ($allRecipes as $recipe): ?>
                                        <tr class="hover:bg-[#4d2c16]/10 transition">
                                            <td class="px-6 py-4 font-medium"><?= htmlspecialchars($recipe->getRecipeTitle()) ?></td>
                                            <td class="px-6 py-4 hidden md:table-cell"><?= htmlspecialchars($recipe->getUser()->getUserName()) ?></td>
                                            <td class="px-6 py-4 flex flex-col items-end">
                                                <a href="?pg=recette&slug=<?= $recipe->getRecipeSlug() ?>" target="_blank" class="text-gray-500 hover:text-blue-600 p-2 rounded-full transition" title="Voir"><i data-lucide="eye" class="w-5 h-5"></i></a>
                                                <a href="?pg=admin&action=edit_recipe&id=<?= $recipe->getRecipesId() ?>" class="text-gray-500 hover:text-green-600 p-2 rounded-full transition ml-2" title="Modifier"><i data-lucide="pencil" class="w-5 h-5"></i></a>
                                                <a href="?pg=admin&action=delete_recipe&id=<?= $recipe->getRecipesId() ?>" class="text-gray-500 hover:text-red-600 p-2 rounded-full transition ml-2" title="Supprimer" onclick="return confirm('Êtes-vous sûr ?');"><i data-lucide="trash-2" class="w-5 h-5"></i></a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <tr><td colspan="3" class="text-center p-8">Aucune recette pour le moment.</td></tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Section de gestion des utilisateurs -->
                <div id="utilisateurs" class="tab-content">
                    <h2 class="text-3xl text-[#4d2c16] mb-4">Les Utilisateurs</h2>
                     <div class="overflow-x-auto rounded-lg border border-gray-200/50">
                        <table class="w-full table-auto text-left table-striped">
                           <thead class="bg-[#4d2c16]/10 text-[#4d2c16]">
                                <tr class="border-b-2 border-[#4d2c16]/30">
                                    <th class="px-6 py-3 font-semibold">Nom</th>
                                    <th class="px-6 py-3 font-semibold hidden md:table-cell">Email</th>
                                    <th class="px-6 py-3 ps-8 font-semibold">Rôle</th>
                                </tr>
                            </thead>
                            <tbody class="text-[#4d2c16]">
                                <?php if (isset($allUsers) && !empty($allUsers)): ?>
                                    <?php foreach ($allUsers as $user): ?>
                                        <tr class="hover:bg-[#4d2c16]/10 transition">
                                            <td class="px-6 py-4 font-medium"><?= htmlspecialchars($user->getUserName()) ?></td>
                                            <td class="px-6 py-4 hidden md:table-cell"><?= htmlspecialchars($user->getUserMail()) ?></td>
                                            <td class="px-6 py-4">
                                                <span class="px-3 py-1 rounded-full text-sm font-semibold <?= $user->getUserRole() === 'admin' ? 'bg-red-100 text-red-800' : 'bg-green-100 text-green-800' ?>">
                                                    <?= htmlspecialchars($user->getUserRole()) ?>
                                                </span>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <tr><td colspan="3" class="text-center p-8">Aucun utilisateur trouvé.</td></tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Section de gestion des commentaires -->
                <div id="commentaires" class="tab-content">
                    <h2 class="text-3xl text-[#4d2c16] mb-4">Les Commentaires</h2>
                    <div class="overflow-x-auto rounded-lg border border-gray-200/50">
                        <table class="w-full table-auto text-left table-striped">
                            <thead class="bg-[#4d2c16]/10 text-[#4d2c16]">
                                <tr class="border-b-2 border-[#4d2c16]/30">
                                    <th class="px-6 py-3 font-semibold">Message</th>
                                    <th class="px-6 py-3 font-semibold hidden sm:table-cell">Auteur</th>
                                    <th class="px-6 py-3 font-semibold hidden md:table-cell">Recette</th>
                                    <th class="px-6 py-3 font-semibold text-right">Action</th>
                                </tr>
                            </thead>
                           <tbody class="text-[#4d2c16]">
                                <?php if (isset($allComments) && !empty($allComments)): ?>
                                    <?php foreach ($allComments as $comment): ?>
                                        <tr class="hover:bg-[#4d2c16]/10 transition">
                                            <td class="px-6 py-4 max-w-sm">
                                                <p class="font-bold"><?= htmlspecialchars($comment->getCommentSujet()) ?></p>
                                                <p class="text-sm text-gray-600 truncate"><?= htmlspecialchars($comment->getCommentMessage()) ?></p>
                                            </td>
                                            <td class="px-6 py-4 hidden sm:table-cell"><?= htmlspecialchars($comment->getUsers()->getUserName()) ?></td>
                                            <td class="px-6 py-4 hidden md:table-cell"><?= htmlspecialchars($comment->getRecipes()->getRecipeTitle()) ?></td>
                                            <td class="px-6 py-4 flex flex-col items-end">
                                                <a href="?pg=admin&action=delete_comment&id=<?= $comment->getCommentsId() ?>" class="text-gray-500 hover:text-red-600 p-2 rounded-full transition" title="Supprimer" onclick="return confirm('Êtes-vous sûr ?');"><i data-lucide="trash-2" class="w-5 h-5"></i></a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <tr><td colspan="4" class="text-center p-8">Aucun commentaire pour le moment.</td></tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Section de gestion des notes -->
                <div id="notes" class="tab-content">
                    <h2 class="text-3xl text-[#4d2c16] mb-4">Les Notes</h2>
                    <div class="overflow-x-auto rounded-lg border border-gray-200/50">
                        <table class="w-full table-auto text-left table-striped">
                            <thead class="bg-[#4d2c16]/10 text-[#4d2c16]">
                                <tr class="border-b-2 border-[#4d2c16]/30">
                                    <th class="px-6 py-3 font-semibold">Recette</th>
                                    <th class="px-6 py-3 font-semibold hidden sm:table-cell">Utilisateur</th>
                                    <th class="px-6 py-3 font-semibold">Note</th>
                                </tr>
                            </thead>
                           <tbody class="text-[#4d2c16]">
                                <?php if (isset($allLikes) && !empty($allLikes)): ?>
                                    <?php foreach ($allLikes as $like): ?>
                                        <tr class="hover:bg-[#4d2c16]/10 transition">
                                            <td class="px-6 py-4 font-medium"><?= htmlspecialchars($like->getRecipe()->getRecipeTitle()) ?></td>
                                            <td class="px-6 py-4 hidden sm:table-cell"><?= htmlspecialchars($like->getUser()->getUserName()) ?></td>
                                            <td class="px-6 py-4">
                                                <div class="flex items-center">
                                                    <span class="text-lg font-bold text-amber-500 mr-1"><?= htmlspecialchars($like->getLikeCote()) ?></span>
                                                    <i data-lucide="star" class="w-5 h-5 text-amber-500 fill-current"></i>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <tr><td colspan="3" class="text-center p-8">Aucune note pour le moment.</td></tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <?php include "../../frontend/view/components/_footer.html.php"; ?>
    <script src="../../frontend/assets/js/script.js"></script>

    <script>
        // Appel de la fonction pour activer les icônes
        lucide.createIcons();

        document.addEventListener('DOMContentLoaded', function () {
            const tabs = document.querySelectorAll('.tab-link');
            const tabContents = document.querySelectorAll('.tab-content');

            tabs.forEach(tab => {
                tab.addEventListener('click', () => {
                    // Ne rien faire si l'onglet est déjà actif
                    if (tab.classList.contains('active')) {
                        return;
                    }
                    
                    // Désactiver tous les onglets
                    tabs.forEach(t => t.classList.remove('active'));
                    tabContents.forEach(c => c.classList.remove('active'));

                    // Activer l'onglet cliqué
                    tab.classList.add('active');
                    const targetContent = document.getElementById(tab.dataset.tab);
                    if (targetContent) {
                        targetContent.classList.add('active');
                    }
                });
            });
        });
    </script>

</body>
</html>
