<div class="profile">
    <div class="profile__header">
        <h1 class="profile__name"><strong>Username: </strong><?php echo $_SESSION['user']['username']; ?></h1>
        <a href="" class="profile__edit-link">Edit</a>
    </div>
    <p class="profile__contact"><strong>Email: </strong><?php echo $_SESSION['user']['email']; ?></p>
    <p class="profile__contact"><strong>Phone Number: </strong> <?php echo $_SESSION['user']['tel']; ?></p>
    <a href="/logout" class="logout-link">Logout</a>
</div>