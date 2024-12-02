<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JDR Fratrie</title>
    <link rel="stylesheet" href="scss/style.scss">
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <!-- if development -->
    <!-- <script type="module" src="http://localhost:5173/@vite/client"></script>
    <script type="module" src="http://localhost:5173/js/script.js"></script> -->

    <!-- Production -->
    <link rel="stylesheet" href="assets/assets/script-BW4HPhpW.css">
    <script type="module" src="assets/assets/script-pK4JEM7c.js"></script>

    <!-- RPG DICES 3D -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r136/three.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/cannon-es/0.20.0/cannon-es.min.js"></script>
    <script src="rollingTheDices.js"></script>

</head>

<body>

    <header class="header bg-blur">

        <a href="index.php">
            <h1 class="ttl ttl--main">Don't Roll Single</h1>
        </a>
        <div class="hamburger">
            <a href="#menu" id="hamburger-menu-icon">
                <img src="img/hamburger.svg" alt="Menu Hamburger">
            </a>
        </div>
        <nav class="nav hamburger__menu" id="menu" aria-label="Navigation principale du site">
            <ul class="nav" id="nav-list">
                <li class="nav__itm">
                    <a href="index.php" class="nav__lnk">Accueil</a>
                </li>
                <li class="nav__itm">
                    <a href="worldmap.php" class="nav__lnk">Carte du Monde</a>
                </li>
            </ul>
        </nav>
    </header>

    <main class="container container--grid">

        <section class="dice__section" aria-labelledby="ttl100">
            <div class="dice__banner" data-banner="100" id="banner100">100</div>
            <h2 class="ttl dice__word" id="ttl100">Dé <span class="number">100</span></h2>
            <button id="dice100" data-dice="100" onclick="_rollingTheDices.throw_dices()">
                <img class="dice dice--100" src="img/100.png" alt="Dé 100 de JDR">
            </button>
        </section>

        <section class="dice__section" aria-labelledby="ttl20">
            <div class="dice__banner" data-banner="20" id="banner20">20</div>
            <h2 class="ttl dice__word" id="ttl20">Dé <span class="number">20</span></h2>
            <button id="dice20" data-dice="20">
                <img class="dice" src="img/20.png" alt="Dé 20 de JDR">
            </button>
        </section>

        <section class="dice__section" aria-labelledby="ttl12">
            <div class="dice__banner" data-banner="12" id="banner12">12</div>
            <h2 class="ttl dice__word" id="ttl12">Dé <span class="number">12</span></h2>
            <button id="dice12" data-dice="12">
                <img class="dice" src="img/12.png" alt="Dé 12 de JDR">
            </button>
        </section>

        <section class="dice__section" aria-labelledby="ttl10">
            <div class="dice__banner" data-banner="10" id="banner10">10</div>
            <h2 class="ttl dice__word" id="ttl10">Dé <span class="number">10</span></h2>
            <button id="dice10" data-dice="10">
                <img class="dice" src="img/10.png" alt="Dé 10 de JDR">
            </button>
        </section>

        <section class="dice__section" aria-labelledby="ttl8">
            <div class="dice__banner" data-banner="8" id="banner8">8</div>
            <h2 class="ttl dice__word" id="ttl8">Dé <span class="number">8</span></h2>
            <button id="dice8" data-dice="8">
                <img class="dice" src="img/8.png" alt="Dé 8 de JDR">
            </button>
        </section>

        <section class="dice__section" aria-labelledby="ttl6">
            <div class="dice__banner" data-banner="6" id="banner6">6</div>
            <h2 class="ttl dice__word" id="ttl6">Dé <span class="number">6</span></h2>
            <button id="dice6" data-dice="6">
                <img class="dice" src="img/6.png" alt="Dé 6 de JDR">
            </button>
        </section>

        <section class="dice__section" aria-labelledby="ttl4">
            <div class="dice__banner" data-banner="4" id="banner4">4</div>
            <h2 class="ttl dice__word" id="ttl4">Dé <span class="number">4</span></h2>
            <button id="dice4" data-dice="4">
                <img class="dice" src="img/4.png" alt="Dé 4 de JDR">
            </button>
        </section>

    </main>

    <footer class="footer">
        <p>Pas par là !</p>
    </footer>

</body>

<script type="module" src="js/dices.js"></script>
<!-- <script type="module" src="js/3d.js"></script> -->

</html>