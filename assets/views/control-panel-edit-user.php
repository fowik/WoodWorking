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
            <p><?= $_SESSION['user']['username']?></p>
        </div>
    </div>

    <div class="values">
        <form action="/control-panel/user/edit" method="POST" class="prod-add">
            <input type="hidden" name="uID" value="<?= $user['uID']?>">
            <input type="text" name="username" maxlength="40" placeholder="username" value="<?= $user['Username']?>">
            <input type="email" name="email" maxlength="40" placeholder="email" value="<?= $user['Email']?>">
            <input type="text" name="name" maxlength="40" placeholder="firstname" value="<?= $user['Name']?>">
            <input type="text" name="surname" maxlength="40" placeholder="lastname" value="<?= $user['Surname']?>">
            <input type="text" name="number" maxlength="40" placeholder="number" value="<?= $user['PhoneNumber']?>">
            <input type="submit" value="Update">
        </form>
    </div>
</section>