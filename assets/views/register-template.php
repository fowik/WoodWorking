<div class="register">
	<?php
		if (isset($_SESSION['message'])) {
			echo '
				<div class = msg-cover>
					<p class="msg"> ' . $_SESSION['message'] .'</p>
				</div>';
		}
		unset($_SESSION['message']);
	?>
    <h1>Reģistrācija</h1>
	<form action="/register" method="POST">
		<input type="text" id="username" name="username" placeholder="Username"><br><br>

		<input type="email" id="email" name="email" placeholder="E-mail"><br><br>

		<input type="tel" id="number" name="number" placeholder="Phone number"><br><br>

		<input type="password" id="password" name="password" placeholder="Password"><br><br>

		<input type="password" id="confirm_password" name="confirm_password" placeholder="Confirm Password"><br><br>

		<input type="submit" value="Register">
		<a href="/login">vai pieslēdzies</a>
	</form>
</div>
