<section id="menu">
    <div class="menu">
        <div class="logo">
            <h2>Vadības panelis</h2>
        </div>
    </div>

    <div class="items">
        <li><a href="/control-panel">Dashboard</a></li>
        <li class="dropdown">
            <a href="/control-panel/products">Products list</a>
            <div class="dropdown-content">
                <a href="/control-panel/products/type-add">Add type</a>
                <a href="/control-panel/products/add">Add product</a>
            </div>
        </li>
        <li><a href="/control-panel/managers">Managers list</a></li>
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

    <div class="values">
        <form action="/control-panel/products/add" method="POST" class="prod-add">
            <input type="text" name="title" placeholder="Produkta nosaukums">
            <input type="text" name="description" placeholder="Produkta apraksts">
            <input type="number" name="price" placeholder="Produkta cena">
            <input type="hidden" name="catID" placeholder="Produkta kategorija">
            <select name="catID" id="">
                <?php foreach ($types as $category) { ?>
                    <option value="<?= $category['catID'] ?>">
                        <?php echo $category['Type'] ?>
                    </option>
                <?php } ?>
            </select>
            <input type="submit" value="Pievienot produktu">
        </form>
    </div>
</section>