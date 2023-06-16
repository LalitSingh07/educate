<?php

$pageTitle="login | educate"
?>
<?php require_once 'shared/header.php'; ?>

    <div class="bg-img">
        <div class="content">
    <div class="form">
        <h2>Login form</h2>
      
    <form action="">
    <div class="error-text"></div>
        <div class="grid-details">
            <div class="input">
                <label for="">Email</label>
                <input type="email" name="email" placeholder="Email" required >
            </div>
        </div>


       <div class="grid-details">
            <div class="input">
                <label for="">Password</label>
                <input type="password" name="pass" placeholder="password" required>
            </div>
        </div>
     
        <div class="submit">
            <input type="submit" value="Login" class="button">
        </div>
</form>

   <div class="link">Not signed up? <a href="register.php">Sign up now</a></div>
    </div>
    </div>
    </div>

    <script src="./javascript/logins.js"></script>
</body>
</html>