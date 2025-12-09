<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>En construstion</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
  <link rel="stylesheet" href="../../css/style.css" />
  <link rel="icon" href="../../frontend/assets/images/tablette_chocolat1.ico" type="image/png" />
</head>

<body style="background-color: #e8e0d8">
  <div class="min-h-screen flex flex-col items-center justify-center">
    <div class="text-center">
      <img src="../../images//404/grueChocolat (1).webp" alt="Chocolat Hub" class="w-1/2 h-1/2 mb-8 mx-auto" />
      <div class="max-w-lg mx-auto">
        <h1 class="text-6xl font-bold text-[#7a3c18] mb-4">
          En construstion
        </h1>
        <h2 class="text-3xl font-serif text-[#4d2c16] mb-6">
          Oups ! Cette page est en construstion...
        </h2>
        <a href="../../index.html" class="border rounded text-[#4d2c16] px-3" style="border-color: #4d2c16">Retour à
          l'accueil.</a>
      </div>
    </div>
  </div>

  <!-- Footer -->
  <?php include "../../frontend/view/components/_footer.html.php"; ?>

  <script>
    function carousel() {
      return {
        current: 0,
        internalIndex: 0,
        visibleSlides: 1,
        slidePercentage: 100,
        useTransition: true,
        slides: [
          {
            id: 1,
            image: "../../images/JM-recette/beurre.png",
          },
          {
            id: 2,
            image: "../../images/JM-recette/cacao.png",
          },
          {
            id: 3,
            image: "../../images/JM-recette/chocolat-noir.png",
          },
          {
            id: 4,
            image: "../../images/JM-recette/farine.png",
          },
          {
            id: 5,
            image: "../../images/JM-recette/lait.png",
          },
          {
            id: 6,
            image: "../../images/JM-recette/noisettes.png",
          },
          {
            id: 7,
            image: "../../images/JM-recette/oeufs.png",
          },
          {
            id: 8,
            image: "../../images/JM-recette/sucre.png",
          },
          {
            id: 9,
            image: "../../images/JM-recette/vanille.png",
          },
        ],
        track: [],
        get pagesCount() {
          return Math.max(1, this.slides.length - this.visibleSlides + 1);
        },
        get trackStyle() {
          const translate = `transform: translateX(-${this.internalIndex * this.slidePercentage
            }%);`;
          const transition = this.useTransition
            ? "transition: transform 0.5s ease-in-out;"
            : "transition: none;";
          return `${translate} ${transition}`;
        },
        init() {
          this.updateVisibleSlides();
          this.buildTrack();
          window.addEventListener("resize", () => {
            const prevCurrent = this.current;
            this.updateVisibleSlides();
            this.buildTrack(prevCurrent);
          });
        },
        updateVisibleSlides() {
          if (window.innerWidth < 768) {
            this.visibleSlides = 1;
          } else {
            this.visibleSlides = 3;
          }
          this.slidePercentage = 100 / this.visibleSlides;
        },
        buildTrack(keepCurrent = null) {
          if (keepCurrent !== null) {
            this.current = Math.max(
              0,
              Math.min(keepCurrent, this.pagesCount - 1)
            );
          } else {
            this.current = Math.max(
              0,
              Math.min(this.current, this.pagesCount - 1)
            );
          }
          const head = this.slides.slice(-this.visibleSlides);
          const tail = this.slides.slice(0, this.visibleSlides);
          this.track = [...head, ...this.slides, ...tail];
          this.useTransition = false;
          this.internalIndex = this.current + this.visibleSlides;
          requestAnimationFrame(() => {
            this.useTransition = true;
          });
        },
        next() {
          this.current = (this.current + 1) % this.pagesCount;
          this.internalIndex += 1;
        },
        prev() {
          this.current =
            (this.current - 1 + this.pagesCount) % this.pagesCount;
          this.internalIndex -= 1;
        },
        goTo(index) {
          index = Math.max(0, Math.min(index, this.pagesCount - 1));
          const targetInternal = index + this.visibleSlides;
          this.current = index;
          this.internalIndex = targetInternal;
        },
        onTransitionEnd() {
          if (this.internalIndex >= this.slides.length + this.visibleSlides) {
            this.useTransition = false;
            this.internalIndex = this.visibleSlides;
            requestAnimationFrame(() => {
              this.useTransition = true;
            });
          }
          if (this.internalIndex <= 0) {
            this.useTransition = false;
            this.internalIndex = this.slides.length;
            requestAnimationFrame(() => {
              this.useTransition = true;
            });
          }
        },
        handleImageError(slide) {
          slide.image = "https://picsum.photos/id/21/800/600";
        },
      };
    }
  </script>
</body>

</html>