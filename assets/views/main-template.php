<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=1080px, initial-scale=1.0">
    <!-- LINKS -->
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/nav-bar.css">
    <link rel="stylesheet" href="assets/css/footer.css">
    <link rel="stylesheet" href="assets/css/index.css">
        
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
                        <li><a href="/register">Reģistrācija</a></li>
                        <li><a href="">Sākumlapa</a></li>
                        <li><a href="">Par mums</a></li>
                        <li><a href="">Partneri</a></li>
                        <li><a href="">Produkcijas katalogs</a></li>
                        <li><a href="/contact-us">Kontakti</a></li>
                        <li class="dropdown">
                            <a href="">Preču katalogs</a>
                            <div class="dropdown-content">
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

</body>

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
</html>