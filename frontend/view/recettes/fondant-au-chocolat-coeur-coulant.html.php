<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Fondant au Chocolat – Page Recette</title>
    <link rel="stylesheet" href="../../frontend/assets/css/style.css" />

    <style>
        :root{
            --choco-900:#1a0d07;
            --choco-800:#2a140a;
            --choco-700:#3b1c0f;
            --choco-600:#4e2a14;
            --choco-500:#6a3b1c;
            --cacao:#8b5a2b;
            --beige:#eadfcf;
            --cream:#f7f1e9;
            --white:#ffffff;
            --radius:18px;
            --shadow:0 12px 35px rgba(0,0,0,.15);
            --caramel:#c98a3f;
        }

        *{box-sizing:border-box}
        body{
            margin:0;
            font-family: system-ui, -apple-system, Segoe UI, Roboto, Poppins, sans-serif;
            background:
                    radial-gradient(1200px 800px at 10% -10%, #fff, var(--cream)),
                    radial-gradient(900px 700px at 110% 0%, #fff7ec, var(--cream));
            color:var(--choco-900);
            overflow-x:hidden;
            scroll-behavior:smooth;
        }

        /* ====== TOP BAR PROGRESS ====== */
        .progress{
            position:fixed; inset:0 0 auto 0; height:5px; z-index:999;
            background:transparent;
        }
        .progress > i{
            display:block; height:100%; width:0%;
            background:linear-gradient(90deg, var(--cacao), var(--choco-500), #caa27a);
            box-shadow:0 0 12px rgba(139,90,43,.9);
            transition:width .1s linear;
        }

        /* ====== HERO ====== */
        header.hero{
            position:relative; height:min(78vh,740px);
            display:grid; place-items:center;
            background:
                    radial-gradient(1200px 700px at 50% -10%, rgba(255,255,255,.25), transparent 60%),
                    linear-gradient(135deg, var(--choco-700), var(--choco-900));
            color:var(--white);
            overflow:hidden;
        }
        canvas#cacaoCanvas{ position:absolute; inset:0; z-index:0; }
        .hero-content{
            position:relative; z-index:2;
            width:min(1100px, 92vw);
            display:grid; grid-template-columns:1.2fr .8fr; gap:24px; align-items:center;
            padding:0 0 60px 0;
        }
        @media (max-width: 900px){
            .hero-content{ grid-template-columns:1fr; padding-top:40px; }
        }
        .badge{
            display:inline-flex; gap:8px; align-items:center;
            padding:8px 12px; border-radius:999px;
            background:rgba(255,255,255,.12); border:1px solid rgba(255,255,255,.18);
            backdrop-filter: blur(6px);
            font-weight:600; letter-spacing:.2px;
            width:max-content;
            transform:translateY(8px); opacity:0;
            animation: popIn .9s .2s ease forwards;
        }
        .hero h1{
            margin:12px 0 8px; font-size:clamp(2.2rem, 4.5vw, 3.5rem);
            line-height:1.05; letter-spacing:1.2px;
            text-shadow:0 8px 28px rgba(0,0,0,.45);
            transform:translateY(12px); opacity:0;
            animation: popIn 1.1s .35s ease forwards;
        }
        .hero p{
            font-size:clamp(1.05rem, 2vw, 1.18rem);
            line-height:1.7; opacity:.95;
            transform:translateY(12px); opacity:0;
            animation: popIn 1s .5s ease forwards;
        }
        .hero-meta{
            margin-top:14px; display:flex; flex-wrap:wrap; gap:10px;
            transform:translateY(12px); opacity:0;
            animation: popIn .9s .65s ease forwards;
        }
        .meta-chip{
            background:rgba(255,255,255,.12); border:1px solid rgba(255,255,255,.18);
            padding:8px 10px; border-radius:12px; font-weight:600; font-size:.95rem;
        }
        .hero-card{
            background:rgba(255,255,255,.08);
            border:1px solid rgba(255,255,255,.16);
            border-radius:20px; padding:18px 18px 16px;
            box-shadow:0 10px 30px rgba(0,0,0,.25);
            backdrop-filter: blur(8px);
            transform:translateY(18px) rotate(-.4deg); opacity:0;
            animation: popIn 1.2s .6s ease forwards;
        }
        .hero-card h3{ margin:0 0 8px; font-size:1.15rem; }
        .hero-card ul{ margin:0; padding-left:18px; line-height:1.8; }

        @keyframes popIn{ to{ transform:none; opacity:1; } }

        /* ====== NAV STICKY ====== */
        nav.sticky{
            position:sticky; top:0; z-index:50;
            background:rgba(247,241,233,.8);
            border-bottom:1px solid #00000010;
            backdrop-filter: blur(8px);
        }
        .nav-inner{
            width:min(1100px, 92vw); margin:auto;
            display:flex; align-items:center; justify-content:space-between;
            padding:10px 0;
        }
        .brand{ font-weight:900; letter-spacing:.6px; color:var(--choco-800); }
        .nav-links{ display:flex; gap:12px; flex-wrap:wrap; }
        .nav-links a{
            text-decoration:none; color:var(--choco-800); font-weight:700;
            padding:6px 10px; border-radius:10px; transition:.2s;
        }
        .nav-links a:hover{ background:var(--beige); transform:translateY(-1px); }

        /* ====== SECTIONS ====== */
        main{ width:min(1100px, 92vw); margin:20px auto 80px; }
        section{
            background:var(--white); border-radius:var(--radius); box-shadow:var(--shadow);
            padding:22px; margin:18px 0; position:relative; overflow:hidden;
        }
        section .section-title{
            display:flex; align-items:center; gap:10px;
            margin:0 0 10px; color:var(--choco-700);
        }
        .section-title h2{ margin:0; font-size:1.55rem; }
        .section-title .dot{
            width:10px; height:10px; border-radius:50%;
            background:var(--cacao); box-shadow:0 0 0 6px #8b5a2b22;
        }
        .lead{ font-size:1.06rem; line-height:1.8; color:#2a140ae6; }

        /* ====== CAROUSEL (zoom -> dezoom sans bords) ====== */
        .carousel{ position:relative; border-radius:16px; overflow:hidden; height:460px; background:#000; }
        .slides{ height:100%; position:relative; }
        .slide{
            position:absolute; inset:0; opacity:0;
            transform:scale(1.22); transform-origin:center;
            transition: opacity 1s ease, transform 6s ease;
        }
        .slide.active{ opacity:1; transform:scale(1.06); }
        .slide img{ width:100%; height:100%; object-fit:cover; }

        .cap{
            position:absolute; left:16px; bottom:16px; right:16px;
            color:white; background:linear-gradient(180deg, transparent, rgba(0,0,0,.6));
            padding:22px 14px 12px; border-radius:12px;
            font-weight:700; letter-spacing:.3px;
        }
        .c-btn{
            position:absolute; top:50%; transform:translateY(-50%);
            background:rgba(0,0,0,.45); border:1px solid rgba(255,255,255,.2);
            color:white; font-size:2.2rem; width:54px; height:54px; border-radius:14px;
            display:grid; place-items:center; cursor:pointer; z-index:5; transition:.2s;
        }
        .c-btn:hover{
            background:rgba(0,0,0,.7);
            transform:translateY(-50%) scale(1.05);
        }
        .c-btn.prev{ left:12px; } .c-btn.next{ right:12px; }

        .dots{
            position:absolute; left:50%; bottom:14px; transform:translateX(-50%);
            display:flex; gap:8px; z-index:6;
            background:rgba(0,0,0,.35); padding:6px 8px; border-radius:999px;
            backdrop-filter: blur(6px);
        }
        .dot-btn{
            width:10px; height:10px; border-radius:50%; border:0; cursor:pointer;
            background:#ffffff90; transition:.2s;
        }
        .dot-btn.active{ background:#fff; transform:scale(1.35); }

        .thumbs{ margin-top:10px; display:grid; grid-template-columns:repeat(6,1fr); gap:8px; }
        @media (max-width: 900px){ .thumbs{ grid-template-columns:repeat(3,1fr);} }
        .thumb{
            height:78px; border-radius:12px; overflow:hidden; cursor:pointer;
            outline:2px solid transparent; transition:.2s; position:relative;
        }
        .thumb img{ width:100%; height:100%; object-fit:cover; filter:saturate(1.1); }
        .thumb.active{ outline-color:var(--cacao); transform:translateY(-2px); }
        .thumb::after{
            content:''; position:absolute; inset:0;
            background:linear-gradient(180deg, transparent, rgba(0,0,0,.25)); opacity:.35;
        }

        /* ====== INGREDIENTS GRID ====== */
        .grid{ display:grid; grid-template-columns:1.1fr .9fr; gap:16px; }
        @media (max-width: 900px){ .grid{ grid-template-columns:1fr; } }

        .ingredients{
            display:grid; grid-template-columns:repeat(2,1fr);
            gap:10px; margin-top:10px;
        }
        @media (max-width: 520px){ .ingredients{ grid-template-columns:1fr; } }

        .ing{
            background:var(--cream);
            border:1px dashed #00000014;
            padding:10px 12px; border-radius:12px;
            display:flex; align-items:center; gap:10px; font-weight:700;
            transform:translateY(8px); opacity:0;
        }
        .ing i{
            width:32px; height:32px; border-radius:10px;
            display:grid; place-items:center; background:var(--beige); font-style:normal;
        }

        .facts{
            background:linear-gradient(180deg, #fff, var(--cream));
            border-radius:14px; padding:14px; border:1px solid #00000010;
        }
        .facts h3{ margin:0 0 8px; color:var(--choco-700); }
        .facts p{ margin:.2rem 0; line-height:1.7; }

        /* ====== PREPARATION GUIDÉE (1 étape à la fois) ====== */
        .prep-wrap{ margin-top:8px; }
        .prep-top{
            display:flex; align-items:center; justify-content:space-between;
            gap:12px; flex-wrap:wrap;
        }
        .prep-counter{ font-weight:900; color:var(--choco-700); }
        .prep-bar{
            flex:1; min-width:220px; height:9px;
            background:#00000010; border-radius:999px; overflow:hidden;
        }
        .prep-bar > i{
            display:block; height:100%; width:0%;
            background:linear-gradient(90deg, var(--cacao), var(--choco-600));
            transition:width .35s ease;
        }

        .steps{ display:grid; gap:10px; margin-top:10px; }
        .step{
            display:none;
            padding:16px; background:#fff8f1;
            border:1px solid #00000010; border-radius:14px;
            transform:translateX(-10px); opacity:0;
            transition:all .9s cubic-bezier(.2,.7,.2,1);
        }
        .step.visible{ opacity:1; transform:none; }
        .step.active{
            display:block; background:white;
            border-color:#8b5a2b55;
            box-shadow:0 8px 22px rgba(139,90,43,.2);
        }

        .step-head{ display:flex; align-items:center; gap:12px; margin-bottom:8px; }
        .step .num{
            width:44px; height:44px; border-radius:12px;
            display:grid; place-items:center;
            font-weight:900; color:white; background:var(--choco-600);
            box-shadow:0 6px 16px rgba(78,42,20,.4);
        }
        .step .time{
            margin-left:auto; font-weight:900; color:var(--choco-700);
            background:var(--cream); padding:6px 8px; border-radius:10px;
        }
        .step .txt{ line-height:1.8; font-size:1.04rem; }
        .step .sub{
            margin-top:8px; padding:10px 12px;
            background:var(--cream); border-radius:12px;
            font-weight:700; color:#2a140ad6;
        }

        .step-actions{
            display:flex; gap:8px; margin-top:12px; flex-wrap:wrap;
        }
        .btn{
            padding:10px 12px; border-radius:12px; border:0;
            cursor:pointer; font-weight:800;
            background:var(--choco-700); color:white;
            transition:.2s;
            box-shadow:0 6px 16px rgba(0,0,0,.12);
        }
        .btn:hover{
            transform:translateY(-1px);
            background:var(--caramel);
            color:var(--choco-700);
        }
        .btn-ghost{ background:var(--beige); color:var(--choco-800); }

        /* ====== TIPS ====== */
        .tips{
            display:grid; grid-template-columns:repeat(3,1fr);
            gap:10px; margin-top:10px;
        }
        @media (max-width: 900px){ .tips{ grid-template-columns:1fr; } }
        .tip{
            background:var(--cream); padding:12px; border-radius:14px;
            border:1px solid #00000010;
            line-height:1.7; font-weight:600;
            transform:translateY(10px); opacity:0;
        }

        /* ====== REVEAL ANIM ====== */
        .reveal{
            opacity:0; transform:translateY(26px);
            transition:1s cubic-bezier(.2,.7,.2,1);
        }
        .reveal.visible{ opacity:1; transform:none; }

        /* ====== CHOCO CHIPS FALLING ====== */
        .chip{
            position:fixed;
            width:10px; height:14px; border-radius:3px;
            background:linear-gradient(180deg, #5a3318, #3b1c0f);
            box-shadow:0 6px 10px rgba(0,0,0,.25);
            opacity:.9; z-index:1; pointer-events:none;
            animation: chipFall linear forwards;
        }
        @keyframes chipFall{
            to{ transform:translateY(120vh) rotate(360deg); opacity:0.2; }
        }

        footer{
            width:min(1100px, 92vw);
            margin:0 auto 60px;
            text-align:center;
            color:#2a140a99;
            font-weight:700;
        }

        /* back to top base style */
        #backToTop{
            position:fixed; bottom:22px; right:22px;
            padding:12px 14px; border-radius:12px; border:0;
            background:var(--caramel); color:var(--choco-700);
            font-weight:900; box-shadow:0 6px 18px rgba(0,0,0,.25);
            cursor:pointer; display:none; z-index:999;
        }
    </style>
</head>
<body>

<main>
    <!-- Navbar -->
    <?php include "../../frontend/view/components/_menu.html.php"; ?>
</main>

<div class="progress"><i id="progressBar"></i></div>

<header class="hero" id="top">
    <canvas id="cacaoCanvas" aria-hidden="true"></canvas>

    <div class="hero-content">
        <div>
            <div class="badge">🍫 Spécial chocolat • Recette maison</div>
            <h1>Fondant au Chocolat <br/>cœur coulant</h1>
            <p>
                Une recette pensée comme une <b>tablette de bonheur</b> : croûte fine,
                intérieur dense et velouté, parfum de cacao qui reste longtemps.
                On vise un fondant "bistrot chic"… mais faisable en 25 minutes.
            </p>
            <div class="hero-meta">
                <div class="meta-chip">⏱️ 10 min prépa</div>
                <div class="meta-chip">🔥 18 min cuisson</div>
                <div class="meta-chip">🍽️ 6 parts</div>
                <div class="meta-chip">😋 Niveau : facile</div>
            </div>
        </div>

        <div class="hero-card">
            <h3>Pourquoi cette recette est spéciale ?</h3>
            <ul>
                <li>Un chocolat noir bien choisi = goût profond, pas trop sucré.</li>
                <li>Cuisson courte + repos = cœur coulant garanti.</li>
                <li>Texture "nuage dense" grâce au mélange délicat.</li>
            </ul>
        </div>
    </div>
</header>

<nav class="sticky">
    <div class="nav-inner">
        <div class="brand">ChocoRecettes</div>
        <div class="nav-links">
            <a href="#photos">Photos</a>
            <a href="#ingredients">Ingrédients</a>
            <a href="#preparation">Préparation</a>
            <a href="#astuces">Astuces</a>
        </div>
    </div>
</nav>

<main>
    <!-- PHOTOS / CAROUSEL -->
    <section id="photos" class="reveal">
        <div class="section-title"><span class="dot"></span><h2>Galerie chocolatée</h2></div>
        <p class="lead">
            Fais défiler les images : on suit la recette comme un mini-film.
            Clique sur les miniatures ou glisse sur mobile.
        </p>

        <div class="carousel" aria-label="Carrousel de photos">
            <div class="slides" id="slides">
                <figure class="slide active">
                    <img src="https://images.unsplash.com/photo-1606313564200-e75d5f0166bd?q=80&w=1600&auto=format&fit=crop" alt="Fondant prêt à servir"/>
                    <figcaption class="cap">Fondant tout juste sorti du four.</figcaption>
                </figure>
                <figure class="slide">
                    <img src="https://images.unsplash.com/photo-1610450949065-1f2841536c88?q=80&w=1600&auto=format&fit=crop" alt="Chocolat fondu"/>
                    <figcaption class="cap">Chocolat noir fondu, brillant, parfum intense.</figcaption>
                </figure>
                <figure class="slide">
                    <img src="https://images.unsplash.com/photo-1541781408260-3c1b6a7a5f91?q=80&w=1600&auto=format&fit=crop" alt="Pâte au chocolat"/>
                    <figcaption class="cap">La pâte épaisse et satinée.</figcaption>
                </figure>
                <figure class="slide">
                    <img src="https://images.unsplash.com/photo-1601972599720-36938d4ecd31?q=80&w=1600&auto=format&fit=crop" alt="Découpe du fondant"/>
                    <figcaption class="cap">Découpe : le cœur coule doucement.</figcaption>
                </figure>
                <figure class="slide">
                    <img src="https://images.unsplash.com/photo-1603532648955-039310d9ed75?q=80&w=1600&auto=format&fit=crop" alt="Fondant avec cacao"/>
                    <figcaption class="cap">Un nuage de cacao pour finir.</figcaption>
                </figure>
            </div>

            <button class="c-btn prev" id="prev" aria-label="Image précédente">❮</button>
            <button class="c-btn next" id="next" aria-label="Image suivante">❯</button>
            <div class="dots" id="dots" aria-hidden="true"></div>
        </div>

        <div class="thumbs" id="thumbs" aria-label="Miniatures"></div>
    </section>

    <!-- INGREDIENTS -->
    <section id="ingredients" class="reveal">
        <div class="section-title"><span class="dot"></span><h2>Ingrédients</h2></div>

        <div class="grid">
            <div>
                <p class="lead">
                    Petit secret : <b>ne prends pas un chocolat trop sucré</b>.
                    Un 70% cacao donne une vraie profondeur. Si tu aimes plus doux,
                    passe à 60% mais garde du caractère.
                </p>

                <div class="ingredients" id="ingList">
                    <div class="ing"><i>🍫</i>200 g chocolat noir 70%</div>
                    <div class="ing"><i>🧈</i>120 g beurre doux</div>
                    <div class="ing"><i>🍬</i>120 g sucre fin</div>
                    <div class="ing"><i>🥚</i>3 œufs</div>
                    <div class="ing"><i>🌾</i>50 g farine tamisée</div>
                    <div class="ing"><i>🧂</i>1 pincée de sel</div>
                </div>
            </div>

            <aside class="facts">
                <h3>Infos pratiques</h3>
                <p><b>Moule :</b> 20–22 cm (ou 6 ramequins).</p>
                <p><b>Cuisson :</b> chaleur tournante 180°C.</p>
                <p><b>Texture :</b> bord cuit + centre fondant.</p>
                <p><b>Accord parfait :</b> crème anglaise, glace vanille ou café serré.</p>
                <p><b>Option :</b> une pointe de cannelle ou de fleur de sel pour relever.</p>
            </aside>
        </div>
    </section>

    <!-- PREPARATION -->
    <section id="preparation" class="reveal">
        <div class="section-title"><span class="dot"></span><h2>Préparation guidée</h2></div>
        <p class="lead">
            Ici, on affiche <b>une seule étape à la fois</b> pour cuisiner sans te perdre.
            Utilise les boutons pour avancer pas à pas.
        </p>

        <div class="prep-wrap">
            <div class="prep-top">
                <div class="prep-counter" id="prepCounter">Étape 1 / 6</div>
                <div class="prep-bar" aria-hidden="true"><i id="prepFill"></i></div>
            </div>

            <div class="steps" id="steps">
                <article class="step active">
                    <div class="step-head">
                        <div class="num">1</div>
                        <div><b>Fondre chocolat + beurre</b></div>
                        <div class="time">3–4 min</div>
                    </div>
                    <div class="txt">
                        Coupe le beurre en morceaux. Mets-le avec le chocolat dans un bol résistant à la chaleur.
                        Place ce bol sur une casserole d’eau frémissante (le bol ne doit pas toucher l’eau).
                        Remue doucement jusqu’à obtenir une crème <b>lisse, brillante et homogène</b>.
                    </div>
                    <div class="sub">✅ Objectif : une ganache fluide, sans “cuisson” du chocolat.</div>
                </article>

                <article class="step">
                    <div class="step-head">
                        <div class="num">2</div>
                        <div><b>Ajouter le sucre</b></div>
                        <div class="time">2 min</div>
                    </div>
                    <div class="txt">
                        Retire le bol du bain-marie. Verse le sucre en pluie et mélange à la spatule.
                        Pas besoin de fouetter : on veut garder une texture dense.
                    </div>
                    <div class="sub">✅ Astuce : goûte ici si tu veux ajouter une micro-pincée de sel.</div>
                </article>

                <article class="step">
                    <div class="step-head">
                        <div class="num">3</div>
                        <div><b>Incorporer les œufs</b></div>
                        <div class="time">3 min</div>
                    </div>
                    <div class="txt">
                        Ajoute les œufs <b>un par un</b>. Mélange entre chaque ajout jusqu’à absorption complète.
                        Évite de battre trop fort : sinon le fondant gonfle puis retombe.
                    </div>
                    <div class="sub">✅ Texture attendue : pâte lisse, épaisse, qui retombe en “ruban”.</div>
                </article>

                <article class="step">
                    <div class="step-head">
                        <div class="num">4</div>
                        <div><b>Ajouter farine + sel</b></div>
                        <div class="time">2 min</div>
                    </div>
                    <div class="txt">
                        Tamise la farine au-dessus du bol. Ajoute le sel, puis mélange juste assez
                        pour ne plus voir de farine. Trop mélanger rendrait le fondant sec.
                    </div>
                    <div class="sub">✅ Hint : mélange en “8” avec la spatule, pas au fouet.</div>
                </article>

                <article class="step">
                    <div class="step-head">
                        <div class="num">5</div>
                        <div><b>Mettre au moule</b></div>
                        <div class="time">1–2 min</div>
                    </div>
                    <div class="txt">
                        Beurre le moule. Verse la pâte, lisse le dessus puis tapote le moule
                        pour chasser les bulles d’air.
                    </div>
                    <div class="sub">✅ Option : 15 min au frigo pour un cœur encore plus coulant.</div>
                </article>

                <article class="step">
                    <div class="step-head">
                        <div class="num">6</div>
                        <div><b>Cuisson + repos</b></div>
                        <div class="time">18 min</div>
                    </div>
                    <div class="txt">
                        Enfourne à 180°C. Le bord doit être pris mais le centre souple.
                        Laisse reposer 10 min dans le moule avant de démouler.
                    </div>
                    <div class="sub">✅ Test : une lame ressort humide au centre = parfait.</div>
                </article>
            </div>

            <div class="step-actions">
                <button class="btn" id="prevStep">Étape précédente</button>
                <button class="btn" id="nextStep">Étape suivante</button>
                <button class="btn btn-ghost" id="autoPlay">Auto-guide</button>
                <button class="btn btn-ghost" id="quickToggle">Lecture rapide</button>
            </div>
        </div>
    </section>

    <!-- ASTUCES -->
    <section id="astuces" class="reveal">
        <div class="section-title"><span class="dot"></span><h2>Astuces & variantes</h2></div>
        <p class="lead">
            Le fondant est une base. Tu peux le rendre plus corsé, plus coulant,
            ou le parfumer sans trahir l’esprit chocolat.
        </p>

        <div class="tips" id="tips">
            <div class="tip">✨ <b>Cœur ultra-coulant :</b> pâte 15 min au frigo + 1–2 min de cuisson en moins.</div>
            <div class="tip">🌰 <b>Version pralinée :</b> 80 g de noisettes torréfiées concassées.</div>
            <div class="tip">🧂 <b>Fleur de sel :</b> une pincée sur le gâteau chaud au service.</div>
            <div class="tip">☕ <b>Chocolat corsé :</b> 1 c. à café de café soluble dans la pâte.</div>
            <div class="tip">🍒 <b>Forêt noire :</b> quelques griottes au sirop au centre.</div>
            <div class="tip">🍌 <b>Choco-banane :</b> ½ banane écrasée pour un fondant plus humide.</div>
        </div>
    </section>
</main>

<button id="backToTop" aria-label="Retour en haut">↑ Haut</button>

<script>
    /* 1) SCROLL PROGRESS BAR */
    const progressBar = document.getElementById('progressBar');
    function updateProgress(){
        const h = document.documentElement;
        const scrolled = (h.scrollTop) / (h.scrollHeight - h.clientHeight);
        progressBar.style.width = (scrolled*100).toFixed(1) + '%';
    }
    window.addEventListener('scroll', updateProgress);
    updateProgress();

    /* 2) REVEAL ON SCROLL */
    const revealEls = document.querySelectorAll('.reveal');
    const io = new IntersectionObserver((entries)=>{
        entries.forEach(e=>{ if(e.isIntersecting) e.target.classList.add('visible'); });
    }, {threshold:0.12});
    revealEls.forEach(el=>io.observe(el));

    /* 3) INGREDIENTS STAGGER */
    const ingItems = document.querySelectorAll('.ing');
    ingItems.forEach((el, idx)=>{
        el.style.transition = 'all .9s cubic-bezier(.2,.7,.2,1)';
        el.style.transitionDelay = (idx*110)+'ms';
        const mini = new IntersectionObserver((entries)=>{
            entries.forEach(e=>{
                if(e.isIntersecting){
                    el.style.opacity=1; el.style.transform='none'; mini.disconnect();
                }
            });
        },{threshold:.4});
        mini.observe(el);
    });

    /* 4) PREMIUM CAROUSEL */
    const slides = [...document.querySelectorAll('.slide')];
    const dotsWrap = document.getElementById('dots');
    const thumbsWrap = document.getElementById('thumbs');
    let sIndex = 0; let timer;

    function buildUI(){
        slides.forEach((s, i)=>{
            const d = document.createElement('button');
            d.className = 'dot-btn'+(i===0?' active':'');
            d.setAttribute('aria-label','Aller à l’image '+(i+1));
            d.onclick = ()=>go(i);
            dotsWrap.appendChild(d);

            const t = document.createElement('div');
            t.className = 'thumb'+(i===0?' active':'');
            t.innerHTML = `<img src="${s.querySelector('img').src}" alt="miniature ${i+1}">`;
            t.onclick = ()=>go(i);
            thumbsWrap.appendChild(t);
        });
    }

    function go(n){
        slides[sIndex].classList.remove('active');
        slides[n].classList.add('active');
        dotsWrap.children[sIndex].classList.remove('active');
        dotsWrap.children[n].classList.add('active');
        thumbsWrap.children[sIndex].classList.remove('active');
        thumbsWrap.children[n].classList.add('active');
        sIndex = n;
        restart();
    }
    function next(){ go((sIndex+1)%slides.length); }
    function prev(){ go((sIndex-1+slides.length)%slides.length); }

    document.getElementById('next').onclick = next;
    document.getElementById('prev').onclick = prev;

    function restart(){ clearInterval(timer); timer = setInterval(next, 4200); }

    // swipe
    const carousel = document.querySelector('.carousel');
    let startX=0, dx=0;
    carousel.addEventListener('touchstart', e=>{ startX = e.touches[0].clientX; dx=0; }, {passive:true});
    carousel.addEventListener('touchmove', e=>{ dx = e.touches[0].clientX - startX; }, {passive:true});
    carousel.addEventListener('touchend', ()=>{ if(Math.abs(dx) > 35){ dx<0 ? next() : prev(); } });

    buildUI(); restart();

    /* 5) PREPARATION GUIDÉE + TOGGLE */
    const stepEls = [...document.querySelectorAll('#steps .step')];
    const prepCounter = document.getElementById('prepCounter');
    const prepFill = document.getElementById('prepFill');
    let stepI = 0; let auto=null;

    function highlight(i){
        stepEls.forEach((s, idx)=>{
            s.classList.remove('active');
            if(idx===i) s.classList.add('active');
        });
        const active = stepEls[i];
        active.classList.remove('visible');
        requestAnimationFrame(()=> active.classList.add('visible'));

        prepCounter.textContent = `Étape ${i+1} / ${stepEls.length}`;
        prepFill.style.width = `${((i+1)/stepEls.length)*100}%`;
        active.scrollIntoView({behavior:'smooth', block:'center'});
    }
    highlight(0);

    document.getElementById('nextStep').onclick = ()=>{
        stepI=Math.min(stepI+1, stepEls.length-1); highlight(stepI);
    };
    document.getElementById('prevStep').onclick = ()=>{
        stepI=Math.max(stepI-1, 0); highlight(stepI);
    };

    document.getElementById('autoPlay').onclick = (e)=>{
        if(auto){ clearInterval(auto); auto=null; e.target.textContent='Auto-guide'; return; }
        e.target.textContent='Stop auto-guide';
        auto = setInterval(()=>{
            stepI = (stepI+1)%stepEls.length; highlight(stepI);
        }, 3200);
    };

    // Toggle lecture rapide
    const quickBtn = document.getElementById('quickToggle');
    let quickMode = false;
    quickBtn.onclick = ()=>{
        quickMode = !quickMode;
        if(quickMode){
            stepEls.forEach(s=>{ s.style.display='block'; s.classList.add('visible'); });
            prepCounter.textContent = 'Lecture rapide';
            prepFill.style.width = '100%';
            quickBtn.textContent = 'Quitter lecture rapide';
        } else {
            stepEls.forEach((s,idx)=>{ s.style.display = idx===0 ? 'block':'none'; });
            stepI=0; highlight(0);
            quickBtn.textContent = 'Lecture rapide';
        }
    };

    /* 6) TIPS STAGGER */
    const tips = document.querySelectorAll('.tip');
    tips.forEach((el, idx)=>{
        el.style.transition='all .9s cubic-bezier(.2,.7,.2,1)';
        el.style.transitionDelay=(idx*140)+'ms';
        const obs = new IntersectionObserver((entries)=>{
            entries.forEach(e=>{
                if(e.isIntersecting){
                    el.style.opacity=1; el.style.transform='none'; obs.disconnect();
                }
            });
        },{threshold:.35});
        obs.observe(el);
    });

    /* 7) COCOA PARTICLES CANVAS */
    const canvas = document.getElementById('cacaoCanvas');
    const ctx = canvas.getContext('2d');
    let W,H,particles=[];
    function resize(){
        W=canvas.width=window.innerWidth;
        H=canvas.height=document.querySelector('header.hero').clientHeight;
    }
    window.addEventListener('resize', resize); resize();

    function makeParticles(){
        particles = Array.from({length: 90}, ()=>({
            x: Math.random()*W,
            y: Math.random()*H,
            r: 1.5+Math.random()*3,
            vx: -0.25+Math.random()*0.5,
            vy: 0.2+Math.random()*0.6,
            a: 0.2+Math.random()*0.6
        }));
    }
    makeParticles();

    function draw(){
        ctx.clearRect(0,0,W,H);
        for(const p of particles){
            p.x+=p.vx; p.y+=p.vy;
            if(p.y>H+10){ p.y=-10; p.x=Math.random()*W; }
            if(p.x<-10) p.x=W+10; if(p.x>W+10) p.x=-10;
            ctx.beginPath();
            ctx.fillStyle = `rgba(255,255,255,${p.a})`;
            ctx.arc(p.x,p.y,p.r,0,Math.PI*2);
            ctx.fill();
        }
        requestAnimationFrame(draw);
    }
    draw();

    /* 8) FLOATING CHOCO CHIPS */
    function spawnChip(){
        const c=document.createElement('div');
        c.className='chip';
        const size=6+Math.random()*10;
        c.style.width=size+'px'; c.style.height=(size*1.3)+'px';
        c.style.left=Math.random()*100+'vw';
        c.style.top='-20px';
        c.style.animationDuration=(6+Math.random()*6)+'s';
        c.style.transform=`translateY(0) rotate(${Math.random()*180}deg)`;
        document.body.appendChild(c);
        setTimeout(()=>c.remove(), 12000);
    }
    setInterval(spawnChip, 700);

    /* 9) BACK TO TOP */
    const topBtn = document.getElementById('backToTop');
    window.addEventListener('scroll',()=>{
        topBtn.style.display = window.scrollY > 350 ? 'block' : 'none';
    });
    topBtn.onclick = ()=> window.scrollTo({top:0, behavior:'smooth'});
</script>
</body>
</html>
