<section id="menu">
    <div class="menu">
        <div class="logo">
            <h2>Vadības panelis</h2>
        </div>
    </div>

    <div class="items">
        <li><a href="control-panel">Dashboard</a></li>
        <li class="dropdown">
            <a href="/control-panel/products">Products list</a>
            <div class="dropdown-content">
                <a href="/control-panel/products/type-add">Add type</a>
                <a href="/control-panel/products/add">Add product</a>
            </div>
        </li>
        <li><a href="control-panel/managers">Managers list</a></li>
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
                <h3>83,267</h3>
                <span>Total orders</span>
            </div>
        </div>
        <div class="val-box">
            <i></i>
            <div>
                <h3>822,267</h3>
                <span>Products sell</span>
            </div>
        </div>
        <div class="val-box">
            <i></i>
            <div>
                <h3>$8.26</h3>
                <span>This month</span>
            </div>
        </div>
        <div class="val-box">
            <i></i>
            <div>
                <h3>$8.26</h3>
                <span>This month</span>
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

            <?php foreach ($users as $user) { ?>
                <tbody>
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
                            <a href="#">Edit</a>
                            <a href="#">Delete</a>
                        </td>
                    </tr>
                </tbody>
            <?php } ?>
        </table>
    </div>
</section>