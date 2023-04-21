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
        <div class="board">
            <table width="100%">
                <thead>
                    <tr>
                        <td>Title</td>
                        <td>Description</td>
                        <td>Price</td>
                        <td></td>
                    </tr>
                </thead>
                <?php foreach ($products as $product) { ?>
                    <tbody>
                        <tr>
                            <td class="people">
                                <div class="people-de">
                                    <h5><?= $product['Title'] ?></h5>
                                </div>
                            </td>

                            <td class="people-des">
                                <h5><?= $product['Description'] ?></h5>
                            </td>

                            <td class="role">
                                <p><?= $product['Price'] ?></p>
                            </td>
                            
                                <td class="edit">
                                    <form action="/control-panel/products/delete" method="POST">
                                        <input type="hidden" name="prodID" value="<?= $product['prodID'] ?>">
                                        <a href="/control-panel/products/edit">Edit</a>
                                        <input type="submit" value="Delete"></input>
                                    </form>
                                </td>
                            
                        </tr>
                    </tbody>
                <?php } ?>
            </table>
        </div>
    </div>
</section>