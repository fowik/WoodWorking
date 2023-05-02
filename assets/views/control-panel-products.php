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
                <input type="text" placeholder="Search..." id="searchInput">
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
                <tbody id="tableBody">
                    <?php foreach ($products as $product) { ?>
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
                                    <a href="/control-panel/products/edit?catID=<?=$product['catID']?>&prodID=<?=$product['prodID']?>">Edit</a>
                                    <input type="submit" value="Delete"></input>
                                </form>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</section>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
$(document).ready(function() {
    $("#searchInput").on("keyup", function() {
        var searchTerm = $(this).val();
        $.ajax({
            url: "/control-panel/products/search-products",
            type: "GET",
            data: { search: searchTerm },
            dataType: "json",
            success: function(response) {
                var tableBody = $("#tableBody");
                tableBody.empty(); // удалить все содержимое таблицы
                $.each(response, function(index, product) {
                    var tr = $("<tr></tr>");
                    tr.append("<td class='people'><div class='people-de'><h5>" + product.Title + "</h5></div></td>");
                    tr.append("<td class='people-des'><h5>" + product.Description + "</h5></td>");
                    tr.append("<td class='role'><p>" + product.Price + "</p></td>");
                    tr.append("<td class='edit'><form action='/control-panel/products/delete' method='POST'><input type='hidden' name='prodID' value='" + product.prodID + "'><a href='/control-panel/products/edit?catID=" + product.catID + "&prodID=" + product.prodID + "'>Edit</a><input type='submit' value='Delete'></input></form></td>");
                    tableBody.append(tr);
                });
            }
        });
    });
});
</script>

