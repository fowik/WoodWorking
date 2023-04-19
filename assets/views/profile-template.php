<div class="profile">
    <div class="profile__header">
        <h1 class="profile__name">
            <strong>Username: </strong>
            <?php echo $_SESSION['user']['username']; ?>
        </h1>
        <a href="/logout" class="logout-link">Logout</a>
    </div>
    <?php
			if (isset($_SESSION['message'])) {
				echo '
					<div class = msg-cover>
						<p class="msg"> ' . $_SESSION['message'] .'</p>
					</div>';
			}
			unset($_SESSION['message']);
		?>
    <form id="myForm" action="/profile/edit" method="POST">
        <div class="profile__personal-info">
            <h2>Personal Information</h2>
            <input type="hidden" name="id" value="<?php echo $_SESSION['user']['id']?>">
            <p><strong>Vārds: </strong><input type="text" name="name" value="<?php echo $_SESSION['user']['name']; ?>" disabled></p>
            <p><strong>Uzvārds: </strong><input type="text" name="surname" value="<?php echo $_SESSION['user']['surname']; ?>" disabled></p>
            <p class="profile__contact"><strong>Email: </strong><input name="email" type="text" value="<?php echo $_SESSION['user']['email']; ?>" disabled></p>
            <p class="profile__contact"><strong>Phone Number: </strong> <input type="text" name="tel" value="<?php echo $_SESSION['user']['tel']; ?>" disabled></p>
            <p><?php var_dump( $_SESSION['user']); ?></p>
        </div>
        <input id="editButton" type="button" name="submit" value="Rediģēt?">
        <input id="submitButton" type="submit" name="submit" value="Saglabāt" disabled>
    </form>
</div>

<script>
var editButton = document.getElementById("editButton");
var submitButton = document.getElementById("submitButton");
var inputs = document.querySelectorAll('input[disabled]');
var formElement = document.getElementById("myForm");

editButton.addEventListener("click", function(event) {
    event.preventDefault();
    if (editButton.value === "Rediģēt?") {
        for (var i = 0; i < inputs.length; i++) {
            inputs[i].removeAttribute('disabled', 'disabled');
            
            
        } 
        editButton.value = "Atstāt?";
        submitButton.removeAttribute('disabled', 'disabled');

    } else {
        for (var i = 0; i < inputs.length; i++) {
            inputs[i].setAttribute('disabled', 'disabled');
        }
        editButton.value = "Rediģēt?";
        submitButton.setAttribute('disabled', 'disabled');
        
    }
});
</script>