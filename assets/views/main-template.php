<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="initial-scale=1.0">
    <!-- LINKS -->
    <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet'>
    <link rel="stylesheet" href="/assets/css/style.css">
    <link rel="stylesheet" href="/assets/css/nav-bar.css">
    <link rel="stylesheet" href="/assets/css/footer.css">
    <link rel="stylesheet" href="/assets/css/index.css">
    <link rel="stylesheet" href="/assets/css/profile.css">
    <link rel="stylesheet" href="/assets/css/register.css">
    <link rel="stylesheet" href="/assets/css/login.css">
    <link rel="stylesheet" href="/assets/css/message.css">
    <link rel="stylesheet" href="/assets/css/controlpanel.css">
    <link rel="stylesheet" href="/assets/css/catalog.css">
    <link rel="stylesheet" href="/assets/css/prod-catalog.css">
    <link rel="stylesheet" href="/assets/css/cart.css">
    <!-- LINKS -->
    <title>Danfort</title>
</head>
<header> 
    <nav>
        <div id="navbar">
            <div class="nav-bar">
                <a href="/"><h1>Danfort</h1></a>
                <div class="links">
                    <ul>
                    <li><?php
                        if (isset($_SESSION['user'])) {
                            if ($_SESSION['user']['admin'] === 1) {
                                echo '<a href="/control-panel">Control Panel</a>';
                            } 
                        }
                        ?></li>
                        <li><?php
                        if (isset($_SESSION['user'])) {
                            echo '<a href="/profile">Profils</a>';
                        } else {
                            echo '<a href="/register">Reģistrācija</a>';
                        }
                        ?></li>
                        <li><a onclick="scrollToStart()">Sākumlapa</a></li>
                        <li><a onclick="scrollToAboutUs()">Par mums</a></li>
                        <li><a href="">Partneri</a></li>
                        <li><a href="/catalog">Produkcijas katalogs</a></li>
                        <li><a href="/contact-us">Kontakti</a></li>
                        <li class="dropdown-navbar">
                            <a href="">Preču katalogs</a>
                            <div class="dropdown-content-navbar">
                                <a href="">Apdares dēļi(vagondēļi)</a>
                                <a href="">Block-house(guļbūves baļķu imitācija)</a>
                                <a href="">Grīdas dēļi</a>
                                <a href="">Terases dēļi</a>
                                <a href="">Koka starpsienas</a>
                                <a href="">Pirts iekšējās apdares dēļi</a>
                                <a href="">Aplodas</a>
                                <a href="">Grīdas līstes </a>
                                <a href="">Ēvelēti žāgmaterāli</a>
                                <a href="">Ēvelēti zāģmateriāli (Sibirijas lapēgle)</a>
                            </div>
                        </li>
                        <?php 
                            if (isset($_SESSION['user'])) {
                                echo '<li><a href="/cart">Groza</a></li>';
                            }
                        ?>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
</header>
<body>

<div class="wrapper">
    <div class="main">
            {{ content }}         
    </div>    
</div>

<footer>
    <div class="footer">
        <div class="row">
            <a href="#"><i class="fa fa-facebook"></i></a>
            <a href="#"><i class="fa fa-instagram"></i></a>
            <a href="#"><i class="fa fa-youtube"></i></a>
            <a href="#"><i class="fa fa-twitter"></i></a>
        </div>
        <div class="row">
            <ul>
                <li><a href="#">Kontakti</a></li>
                <li><a href="#">Mūsu pakalpojumi</a></li>
                <li><a href="#">Privātuma politika</a></li>
                <li><a href="#">Noteikumi</a></li>
                <li><a href="#">Karjera</a></li>
            </ul>
        </div>
        <div class="row">
            © 2023 DANFORT WOOD - All rights reserved.
        </div>
    </div>
</footer>
</body>
<script>
    function scrollToAboutUs() {
        window.addEventListener('load', function() {
            const sectionThree = document.querySelector('.section-three');
            sectionThree.scrollIntoView({ behavior: 'smooth' });
        });
    }   
    function scrollToStart() {
        window.location.href = "/";

        const sectionTwo = document.querySelector('.section-one');
        sectionTwo.scrollIntoView({ behavior: 'smooth' });
    }
    function scrollToServices() {
        window.location.href = "/";

        const sectionTwo = document.querySelector('.section-two');
        sectionTwo.scrollIntoView({ behavior: 'smooth' });
    }
</script>
</html>