<div class="profile">
    <div class="profile__header">
        <h1 class="profile__name"><strong>Username: </strong><input type="text" value="<?php echo $_SESSION['user']['username']; ?>"></h1>
        <h2><strong>Vārds: </strong><input type="text" value="<?php echo $_SESSION['user']['name']; ?>"></h2>
        <h2><strong>Uzvārds: </strong><input type="text" value="<?php echo $_SESSION['user']['surname']; ?>"></h2>
    </div>
    <p class="profile__contact"><strong>Email: </strong><input type="text" value="<?php echo $_SESSION['user']['email']; ?>"></p>
    <p class="profile__contact"><strong>Phone Number: </strong> <input type="text" value="<?php echo $_SESSION['user']['tel']; ?>"></p>
    <a href="/logout" class="logout-link">Logout</a>
</div>