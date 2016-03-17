<!DOCTYPE HTML>
<html>
    <head>
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


            <div class="clearfix"></div>
            <div class="regform">
                <h1 class = " loginheader col-lg-2 col-lg-offset-5">Pilot Tours</h1>
                <div class="login col-lg-2 col-lg-offset-5">
                    <form action="register.php" method="POST">
                        <div class="form-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>   
                            <input type="text"
                                   class="contactform"
                                   name="username"
                                   placeholder="Username"
                                   value="<?php if (isset($username)) echo $username; ?>"
                                   />
                            <span class="errorlog">
                                <?php if (isset($errors['username'])) echo $errors['username']; ?>
                            </span>
                            <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                            <input type="password"
                                   class="contactform"
                                   name="password"
                                   placeholder="Password"
                                   value=""
                                   />
                            <span class="errorlog">
                                <?php if (isset($errors['password'])) echo $errors['password']; ?>
                            </span>
                            
                              <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                            <input type="password"
                                   class="contactform"
                                   name="password2"
                                   placeholder="Confirm Password"
                                   value=""
                                   />
                            <span class="errorlog">
                                <?php if (isset($errors['password2'])) echo $errors['password2']; ?>
                            </span>
                        </div>

                        <input type="submit"class = "login-btnspcing form-btn" value="Register" />
                        <p class="col-lg-1 col-lg-offset-9 register"><a href="loginForm.php">LogIn</a></p>                
                    </form>
                </div>
            </div>
        </div>
        <?php require 'footer.php'; ?>


    </body>
</html>
