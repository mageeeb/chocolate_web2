<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Connexion – Chocolat Hub</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="../../frontend/assets/css/style.css" />
    <link rel="icon" href="../assets/images/tablette_chocolat1.ico" type="image/png" />
</head>
<body>
<section id="connexion" class="fixed inset-0 backdrop-blur-lg bg-[#faf3e0]/70">
    <div id="initial-container">
        <svg viewBox="0 0 1000 600" preserveAspectRatio="xMidYMax meet" class="w-full h-full block">
            <g transform="translate(500,600)">
                <path
                    id="slice-1"
                    d="M0,0 L-1800,0 A1800,1800 0 0,1 -1456,-1058 Z"
                    fill="#FAF3E0"
                ></path>
                <path
                    id="slice-2"
                    d="M0,0 L-1456,-1058 A1800,1800 0 0,1 -556,-1712 Z"
                    fill="#b47b52"
                ></path>
                <path
                    id="slice-3"
                    d="M0,0 L-556,-1712 A1800,1800 0 0,1 556,-1712 Z"
                    fill="#f7efe6"
                ></path>
                <path
                    id="slice-4"
                    d="M0,0 L556,-1712 A1800,1800 0 0,1 1456,-1058 Z"
                    fill="#d4a15a"
                ></path>
                <path
                    id="slice-5"
                    d="M0,0 L1456,-1058 A1800,1800 0 0,1 1800,0 Z"
                    fill="#2d1b14"
                ></path>
                <g id="separator-lines">
                    <line
                        x1="0"
                        y1="0"
                        x2="-1456"
                        y2="-1058"
                        stroke="white"
                        stroke-width="5"
                    ></line>
                    <line
                        x1="0"
                        y1="0"
                        x2="-556"
                        y2="-1712"
                        stroke="white"
                        stroke-width="5"
                    ></line>
                    <line
                        x1="0"
                        y1="0"
                        x2="556"
                        y2="-1712"
                        stroke="white"
                        stroke-width="5"
                    ></line>
                    <line
                        x1="0"
                        y1="0"
                        x2="1456"
                        y2="-1058"
                        stroke="white"
                        stroke-width="5"
                    ></line>
                </g>
            </g>
            <image
                id="center-image"
                href="../../frontend/assets/images/ChocolatHub_title2_upscale.png"
                x="350"
                y="50"
                width="300"
                height="280"
            />
            <image
                id="tablette-image"
                href="../../frontend/assets/images/tablette_chocolat.png"
                x="350"
                y="390"
                width="300"
                height="300"
            />
            <image
                id="tablette_croc-image"
                href="../../frontend/assets/images/tablette_chocolat_croc.png"
                x="350"
                y="390"
                width="300"
                height="300"
                transform="rotate(180 500 100)"
            />
            <image
                id="cacao_lait"
                href="../../frontend/assets/images/cacao_lait.png"
                x="10"
                y="250"
                width="300"
                height="180"
                transform="rotate(-38 280 110)"
            />
            <image
                id="cacao_blanc"
                href="../../frontend/assets/images/cacao_blanc.png"
                x="-280"
                y="120"
                width="300"
                height="180"
                transform="rotate(-65 280 100)"
            />
            <image
                id="cacao_blond"
                href="../../frontend/assets/images/cacao_blond.png"
                x="600"
                y="-20"
                width="300"
                height="180"
                transform="rotate(38 300 100)"
            />
            <image
                id="cacao_noir"
                href="../../frontend/assets/images/cacao_noir.png"
                x="730"
                y="-260"
                width="300"
                height="180"
                transform="rotate(65 300 100)"
            />
        </svg>
        <div class="hub-center">
            <button
                onclick="document.getElementById('recipes-section').scrollIntoView({ behavior: 'smooth' })"
                class="bg-[#4d2c16] px-6 py-3 rounded-md text-white hover:bg-[#7b4a2a] transition"
            >
                Explorer
            </button>
        </div>
    </div>
</section>

<!-- Overlay flou -->
<div class="fixed inset-0 backdrop-blur bg-white/60 z-10"></div>


<!-- Bloc Connexion / Inscription -->
<div class="relative z-20 flex flex-col items-center justify-center min-h-screen">
    <div class="bg-white/90 border border-[#b47b52] shadow-xl rounded-2xl px-8 py-10 w-full max-w-md flex flex-col gap-4">
        <!-- Barre d’onglets -->
        <div class="flex justify-center space-x-2">
            <button id="tab-login" type="button"
                    class="inline-block px-4 py-2 rounded-t-md font-semibold transition-all text-[#7a3c18] border-b-2 border-[#4d2c16] hover:text-[#7a3c18] hover:border-[#d4a15a]">
                Connexion
            </button>
            <button id="tab-register" type="button"
                    class="inline-block px-4 py-2 rounded-t-md font-semibold transition-all text-[#b47b52] border-b-2 border-transparent hover:text-[#7a3c18] hover:border-[#d4a15a]">
                Inscription
            </button>
        </div>


        <!-- Formulaire de connexion -->
        <form id="form-login"
              method="post"
              autocomplete="off"
              style="<?= empty($_POST) || isset($_POST['user_name']) ? '' : 'display:none;' ?>"
              class="flex flex-col gap-4"
        >
            <h2 class="text-center text-4xl font-semibold text-[#7a3c18] mb-2">Connexion</h2>
            <?php if (!empty($erreurLogin) || !empty($succesLogin)): ?>
                <?php if (!empty($erreurLogin)): ?>
                    <div class="text-red-600 bg-red-50 p-3 rounded text-center mb-2"><?= htmlspecialchars($erreurLogin) ?></div>
                <?php else: ?>
                    <div class="text-green-700 bg-green-50 p-3 rounded text-center mb-2 font-semibold"><?= htmlspecialchars($succesLogin) ?></div>
                    <script>
                        setTimeout(function () {
                            window.location.href = 'index.php';
                        }, 2000);
                    </script>
                <?php endif; ?>
            <?php endif; ?>
            <div>
                <label for="user_name" class="block text-[#4d2c16] mb-1 font-medium">Identifiant</label>
                <input type="text" id="user_name" name="user_name"
                       class="w-full border rounded-md px-3 py-2 focus:outline-none border-[#b47b52] focus:border-[#d4a15a] transition"
                       required />
            </div>
            <div>
                <label for="user_pwd" class="block text-[#4d2c16] mb-1 font-medium">Mot de passe</label>
                <input type="password" id="user_pwd" name="user_pwd" required
                       class="w-full border rounded-md px-3 py-2 focus:outline-none border-[#b47b52] focus:border-[#d4a15a] transition" />
            </div>
            <button type="submit"
                    class="bg-[#4d2c16] text-white font-semibold py-2 rounded-md hover:bg-[#7b4a2a] transition"
            >Se connecter</button>
            <a onclick="history.back();" class="text-center text-sm text-[#b47b52] mt-3 hover:underline cursor-pointer">← Retour à l'accueil</a>
        </form>

        <!-- Formulaire d’inscription -->
        <form id="form-register"
              method="post"
              action="?pg=register"
              autocomplete="off"
              style="<?= (!empty($_POST) && isset($_POST['register_name'])) ? '' : 'display:none;' ?>"
              class="flex flex-col gap-4"
        >
            <h2 class="text-center text-4xl font-semibold text-[#7a3c18] mb-2">Inscription</h2>
            <?php if (!empty($erreurRegister) || !empty($succesRegister)): ?>
                <?php if (!empty($erreurRegister)): ?>
                    <div class="text-red-600 bg-red-50 p-3 rounded text-center mb-2"><?= htmlspecialchars($erreurRegister) ?></div>
                <?php else: ?>
                    <div class="text-green-700 bg-green-50 p-3 rounded text-center mb-2 font-semibold"><?= htmlspecialchars($succesRegister) ?></div>
                    <script>
                        setTimeout(function () {
                            window.location.href = 'index.php';
                        }, 2000);
                    </script>
                <?php endif; ?>
            <?php endif; ?>
            <div>
                <label for="register_name" class="block text-[#4d2c16] mb-1 font-medium">Identifiant</label>
                <input type="text" id="register_name" name="register_name"
                       class="w-full border rounded-md px-3 py-2 focus:outline-none border-[#b47b52] focus:border-[#d4a15a] transition"
                       required />
            </div>
            <div>
                <label for="register_mail" class="block text-[#4d2c16] mb-1 font-medium">Email</label>
                <input type="email" id="register_mail" name="register_mail"
                       class="w-full border rounded-md px-3 py-2 focus:outline-none border-[#b47b52] focus:border-[#d4a15a] transition"
                       required />
            </div>
            <div>
                <label for="register_pwd" class="block text-[#4d2c16] mb-1 font-medium">Mot de passe</label>
                <input type="password" id="register_pwd" name="register_pwd" required
                       class="w-full border rounded-md px-3 py-2 focus:outline-none border-[#b47b52] focus:border-[#d4a15a] transition" />
            </div>
            <div>
                <label for="register_pwd_confirm" class="block text-[#4d2c16] mb-1 font-medium">Confirmation mot de passe</label>
                <input type="password" id="register_pwd_confirm" name="register_pwd_confirm" required
                       class="w-full border rounded-md px-3 py-2 focus:outline-none border-[#b47b52] focus:border-[#d4a15a] transition" />
            </div>
            <button type="submit"
                    class="bg-[#4d2c16] text-white font-semibold py-2 rounded-md hover:bg-[#7b4a2a] transition"
            >Créer mon compte</button>
            <a onclick="history.back();" class="text-center text-sm text-[#b47b52] mt-3 hover:underline cursor-pointer">← Retour à l'accueil</a>
        </form>
    </div>
</div>

<script>
    // Sélection
    const tabLogin = document.getElementById('tab-login');
    const tabRegister = document.getElementById('tab-register');
    const formLogin = document.getElementById('form-login');
    const formRegister = document.getElementById('form-register');

    // Classes de surlignage
    function activateTab(activeTab, inactiveTab, activeForm, inactiveForm) {
        // Affichage du bon formulaire
        activeForm.style.display = '';
        inactiveForm.style.display = 'none';

        // Onglet actif
        activeTab.classList.add('text-[#7a3c18]', 'border-[#4d2c16]');
        activeTab.classList.remove('text-[#b47b52]', 'border-transparent');
        // Onglet inactif
        inactiveTab.classList.remove('text-[#7a3c18]', 'border-[#4d2c16]');
        inactiveTab.classList.add('text-[#b47b52]', 'border-transparent');
    }
    tabLogin.addEventListener('click', function() {
        activateTab(tabLogin, tabRegister, formLogin, formRegister);
    });
    tabRegister.addEventListener('click', function() {
        activateTab(tabRegister, tabLogin, formRegister, formLogin);
    });
    // État initial selon POST
    <?php if (!empty($_POST) && isset($_POST['register_name'])): ?>
    activateTab(tabRegister, tabLogin, formRegister, formLogin);
    <?php else: ?>
    activateTab(tabLogin, tabRegister, formLogin, formRegister);
    <?php endif; ?>
</script>

</body>
</html>