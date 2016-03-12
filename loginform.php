<!DOCTYPE HTML>
<html>
    <head>
        <meta content="text/html; charset=UTF-8">
        <title>Log In</title>
    </head>
    <body>
        <?php require 'utils/styles.php'; ?>
        <?php require 'utils/scripts.php'; ?>

        <?php
        if (isset($errorMessage))
            echo "<p>$errorMessage</p>";
        ?>
     
        <div class="jumbotronlogin">
            <h1 class = "col-lg-6 col-lg-offset-1">Pilot Tours</h1>
            <form class ="col-lg-6 col-lg-offset-1 login-form form-horizontal" action="login.php" method="POST">
                <div class="form-group">
                    <label for="username">Username: </label>
                    <input type="text"
                           class="control-label"
                           name="username"
                           value="<?php if (isset($formdata['username'])) echo $formdata['username']; ?>"
                           />
                    <span class="error">
                        <?php if (isset($errors['username'])) echo $errors['username']; ?>
                    </span>
                </div>
                <div class="form-group">
                    <label for="password">Password: </label>
                    <input type="password"
                           class="control-label"
                           name="password"
                           value=""
                           />
                    <span class="error">
                        <?php if (isset($errors['password'])) echo $errors['password']; ?>
                    </span>
                </div>
                <input type="submit"class = " btn btn-default login" value="Login" />
                <p><a href="registerForm.php">Register</a></p>                
            </form>
        </div>


    </body>
</html>
