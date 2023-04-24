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
        <form action="/control-panel/product/product-edit" method="POST" class="prod-add">
            <input name="prodID" type="hidden" value="<?= $product['prodID'] ?>">
            <input name="title" type="text" value="<?= $product['Title'] ?>" placeholder="Produkta nosaukums">
            <select name="catID">
                <option value="<?= $product['catID'] ?>" selected><?=$product['type']?></option>
                <?php foreach ($types as $cat) { ?>
                    <option value="<?= $cat['catID'] ?>">
                        <?php echo $cat['type'] ?>
                    </option>
                <?php } ?>
            </select>
            <input type="text" name="description" value="<?= $product['Description'] ?>" placeholder="Apraksts">
            <input type="text" name="price" placeholder="0.00" value="<?= $product['Price'] ?>" inputmode="numeric" pattern="^\d{1,4}([,.]?\d{0,2})?$" oninput="javascript: this.value = this.value.replace(',', '.'); var parts = this.value.split('.'); if (parts.length > 2) { parts.pop(); this.value = parts.join('.') } else if (parts.length == 2) { if (parts[0].length > 4) parts[0] = parts[0].slice(0, 4); if (parts[1].length > 2) parts[1] = parts[1].slice(0, 2); this.value = parts.join('.'); } else if (this.value.length > 4) { this.value = this.value.slice(0, 4); }">
            <input type="submit" value="Update">
        </form>
    </div>
</section>