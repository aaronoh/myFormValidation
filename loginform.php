<!DOCTYPE HTML>
<html>
    <head>
        <title>Log In</title>
        <script src="validateLogIn.js"></script>
    </head>
    <body>
        <?php require 'utils/styles.php'; ?>
        <?php require 'utils/scripts.php'; ?>

        <?php
        if (isset($errorMessage))
            echo "<p>$errorMessage</p>";
        ?>

        <div class="jumbotronlogin">


            <div class="clearfix"></div>
            <div class="loginform">
                <h1 class = " loginheader col-lg-2 col-lg-offset-5">Pilot Tours</h1>
                <div class="login col-lg-2 col-lg-offset-5">
                    <form action="login.php" method="POST">
                        <div class="form-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>   
                            <input type="text"
                                   class="contactform"
                                   name="username"
                                   id ="username"
                                   placeholder="Username"
                                   value="<?php if (isset($formdata['username'])) echo $formdata['username']; ?>"
                                   />
                            <span id = "usernameError" class="errorlog">
                                <?php if (isset($errors['username'])) echo $errors['username']; ?>
                            </span>
                            <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                            <input type="password"
                                   class="contactform"
                                   id ="password"
                                   name="password"
                                   placeholder="Password"
                                   value=""
                                   />
                            <span id = "passwordError" class="errorlog">
                                <?php if (isset($errors['password'])) echo $errors['password']; ?>
                            </span>
                        </div>

                        <input type="submit"class = "login-btnspcing form-btn" id ="Login" value="Login" />
                        <p class="col-lg-1 register"><a href="contact.php">Help</a></p>  
                        <p class="col-lg-1 col-lg-offset-8 register"><a href="registerForm.php">Register</a></p>

                    </form>
                </div>
            </div>
        </div>
        <?php require 'footer.php'; ?>


    </body>
</html>
