<h1>User Profile</h1>
<p><strong>Username:</strong> <?php echo $_SESSION['user']['username']; ?></p>
<p>
    <strong>Email:</strong> <?php echo $_SESSION['user']['email']; ?>
    <a href="profile">Edit</a>
</p>
<p>
    <strong>Phone Number:</strong> <?php echo $_SESSION['user']['tel']; ?>
    <a href="profile">Edit</a>
</p>
<a href="/logout">Logout</a>