<div class="login">
      <form action="/login" method="POST">
      <?php
        if (isset($_SESSION['message'])) {
          echo '
            <div class = msg-cover>
              <p class="msg"> ' . $_SESSION['message'] .'</p>
            </div>';
        }
        unset($_SESSION['message']);
      ?>
        <h1>Ieeja</h1>

        <input type="text" placeholder="Username, phone or e-mail" name="username"><br><br>

        <input type="password" placeholder="Password" name="password"><br><br>

        <input type="submit" value="Login">
        <a href="/register">vai reģistrējies</a>
      </form>
    </div>