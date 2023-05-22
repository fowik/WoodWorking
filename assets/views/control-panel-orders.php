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
                <input type="text" placeholder="Search..." id="searchInput">
            </div>
        </div>

        <div class="profile">
            <p><?php echo $_SESSION['user']['username']?></p>
        </div>
    </div>
    <div>
        <a href="/control-panel/orders/export-to-csv">
            <input type="button" value="Export to CSV">
        </a>
    </div>
    <div class="values">
        <div class="board">
            <table width="100%">
                <thead>
                    <tr>
                        <td>Title</td>
                        <td>Quantity</td>
                        <td>Price</td>
                    </tr>
                </thead>
                <tbody id="tableBody">
                    <?php foreach ($orders as $order) { ?>
                        <tr>
                            <td class="people">
                                <div class="people-de">
                                    <h5><?= $order['Title'] ?></h5>
                                </div>
                            </td>

                            <td class="people-des">
                                <h5><?= $order['Quantity'] ?></h5>
                            </td>


                            <td class="role">
                                <p><?= $order['Price'] ?></p>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</section>