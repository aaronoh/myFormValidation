<html>
    <head>
        <meta content="text/html; charset=UTF-8">
        <title></title>
       <?php require 'utils/styles.php'; ?>
        <?php require 'utils/scripts.php'; ?>
    </head>
    <body>
      
        <h2>Register Form</h2>
        <?php
        if (isset($errorMessage))
            echo "<p>$errorMessage</p>";
        ?>
        <form action="register.php" method="POST">
            <label for="username">Username: </label>
            <input type="text"
                   id="username"
                   name="username"
                   value="<?php if (isset($username)) echo $username; ?>"
                   />
            <span class="error">
                <?php if (isset($errors['username'])) echo $errors['username']; ?>
            </span>
            <br/>
            <label for="password">Password: </label>
            <input type="password"
                   id="password"
                   name="password"
                   value=""
                   />
            <span class="error">
                <?php if (isset($errors['password'])) echo $errors['password']; ?>
            </span>
            <label for="password2">Password: </label>
            <input type="password"
                   id="password2"
                   name="password2"
                   value=""
                   />
            <span class="error">
                <?php if (isset($errors['password2'])) echo $errors['password2']; ?>
            </span>
            <br/>
            <input type="submit" value="Register" />
            <p><a href="loginForm.php">Login</a></p>
        </form>
        
    </body>
</html>
