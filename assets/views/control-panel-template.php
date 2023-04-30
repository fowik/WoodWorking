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

           
                <tbody>
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