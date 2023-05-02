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
            <p><?= $_SESSION['user']['username']?></p>
        </div>


    </div>
    
    <h3 class="i-name">
            Dashboard
    </h3>

    <div class="values">
        <div class="val-box">
            <i></i>
            <div>
                <h3><?= $uCount; ?></h3>
                <span>New Users</span>
            </div>
        </div>
        <div class="val-box">
            <i></i>
            <div class="val-center">
                <h3><?= $oCount; ?></h3>
                <span>Total orders</span>
            </div>
        </div>
        <div class="val-box">
            <i></i>
            <div>
                <h3><?= $pCount; ?></h3>
                <span>Products sell</span>
            </div>
        </div>
        <div class="val-box">
            <i></i>
            <div>
                <h3><?= $totalMonth ?> $</h3>
                <span>This month</span>
            </div>
        </div>
        <div class="val-box">
            <i></i>
            <div>
                <h3><?= $totalYear ?> $</h3>
                <span>This year</span>
            </div>
        </div>
    </div>

    <div class="board">
        <table width="100%">
            <thead>
                <tr>
                    <td>Vārds, Uzvārds</td>
                    <td>Kontaktinformācija</td>
                    <td>Status</td>
                    <td>Role</td>
                    <td></td>
                </tr>
            </thead>

           
                <tbody id="tableBody">
                <?php foreach ($users as $user) { ?>
                    <tr>
                        <td class="people">
                            <div class="people-de">
                                <h5><?= $user['Name']?>, <?= $user['Surname'] ?></h5>
                                <p><?= $user['Username'] ?></p>
                            </div>
                        </td>

                        <td class="people-des">
                            <h5> +371 <?= $user['PhoneNumber'] ?></h5>
                            <p><?= $user['Email'] ?></p>
                        </td>

                        <td class="activee"><p>Active</p></td>
                        <td class="role">
                            <p>
                                <?php 
                                    if ($user['isAdmin'] == 1) { 
                                        echo '<p>Administrators</p>';                                         
                                    } else {
                                        echo '<p>Lietotājs</p>';
                                    }
                                ?>
                            </p>
                        </td>

                        <td class="edit">
                            <form action="/control-panel/delete" method="POST">
                                <a href="/control-panel/edit-user?uID=<?= $user['uID'] ?>">Edit</a>
                                <input type="submit" value="Delete"></input>
                            </form>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</section>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
        $("#searchInput").on("keyup", function() {
            var searchTerm = $(this).val();
            $.ajax({
                url: "/control-panel/search-users",
                type: "GET",
                data: { search: searchTerm },
                dataType: "json",
                success: function(response) {
                    updateTable(response);
                }
            });
        });
    });

    function updateTable(data) {
        var tableBody = $("#tableBody");
        tableBody.empty();

        $.each(data, function(index, user) {
            var tr = $("<tr></tr>");
            tr.append("<td><h5>" + user.Name + ", " + user.Surname + "</h5><p>" + user.Username + "</p></td>");
            tr.append("<td><h5>+371 " + user.PhoneNumber + "<h5><p>" + user.Email + "</p></td>");
            tr.append("<td class='activee'><p>Active</p></td>");
            tr.append("<td class='role'><p>" + (user.isAdmin == 1 ? "Administrators" : "Lietotājs") + "</p></td>");
            tr.append("<td class='edit'><form action='/control-panel/delete' method='POST'><a href='/control-panel/edit-user?uID=" + user.uID + "'>Edit</a><input type='submit' value='Delete'></input></form></td>");

            tableBody.append(tr);
        });
    }
</script>
</script>