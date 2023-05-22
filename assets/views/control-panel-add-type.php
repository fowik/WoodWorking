<section id="menu">
    <div class="menu">
        <div class="logo">
            <h2>Vadības panelis</h2>
        </div>
    </div>

    <div class="items">
        <li><a href="/control-panel">Dashboard</a></li>
        <li class="dropdown">
            <a href="/control-panel/products" class="dropping">Products list</a>
            <ul class="dropdown-content">
                <li>
                    <a href="/control-panel/products/type-add">Add type</a>
                </li>
                <li>
                    <a href="/control-panel/products/add">Add product</a>
                </li>
            </ul>
        </li>
        <li><a href="/control-panel/managers">Managers list</a></li>
        <li><a href="/control-panel/orders">Order history</a></li>
    </div>
    
</section>
<section id="interface">
    <div class="navigation">
        <div class="n1">
            <div class="search">
                <input type="text" placeholder="Search...">
            </div>
        </div>

        <div class="profile">
            <p><?php echo $_SESSION['user']['username']?></p>
        </div>
    </div>
    <div class="message">
        <div class="mesg">
            <?php
                if (isset($_SESSION['message'])) {
                echo '
                    <div class = msg-cover>
                        <p class="msg"> ' . $_SESSION['message'] .'</p>
                    </div>';
                }
                unset($_SESSION['message']);
            ?>
        </div>
    </div>
    <div class="values">
        <form action="/control-panel/products/type-add" method="POST" class="type-add">
            <input type="text" name="type" placeholder="Tipa nosaukums">
            <input type="submit" value="Pievienot tipu">
        </form>
    </div>
</section>