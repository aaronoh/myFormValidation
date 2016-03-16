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
            <h1 class = " loginheader col-lg-2 col-lg-offset-5">Pilot Tours</h1>
            <div class="clearfix"></div>

            <div class="login col-lg-2 col-lg-offset-5">
                <form action="login.php" method="POST">
                    <div class="form-group">

                        <input type="text"
                               class="contactform"
                               name="username"
                               placeholder="Username"
                               value="<?php if (isset($formdata['username'])) echo $formdata['username']; ?>"
                               />
                        <span class="error">
                            <?php if (isset($errors['username'])) echo $errors['username']; ?>
                        </span>

                        <input type="password"
                               class="contactform"
                               name="password"
                               placeholder="Password"
                               value=""
                               />
                        <span class="error">
                            <?php if (isset($errors['password'])) echo $errors['password']; ?>
                        </span>
                    </div>
                    <input type="submit"class = "form-btn" value="Login" />
                    <p><a href="registerForm.php">Register</a></p>                
                </form>
            </div>
        </div>
        <?php require 'footer.php'; ?>


    </body>
</html>
