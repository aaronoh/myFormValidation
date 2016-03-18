<!DOCTYPE HTML>
<html>
    <head>
        <title>Register</title>
        <!--javascript script for form validation-->
        <script src="validateRegister.js"></script>
        <!--Links to my google fonts bootstrap/my own style sheets & javascript scripts-->
        <?php require 'utils/styles.php'; ?>
        <?php require 'utils/scripts.php'; ?>
    </head>
    <body>
        <?php
        if (isset($errorMessage))
            echo "<p>$errorMessage</p>";
        ?>
        <!--Register form contained in this div, background image set in this div-->
        <div class="jumbotronlogin">
            <!--clearfix to fix whitespace issues (top)-->
            <div class="clearfix"></div>
            <!--form contained in this div-->
            <div class="regform">
                <!--page header-->
                <h1 class = " loginheader col-lg-2 col-lg-offset-5">Pilot Tours</h1>
                <!--form elements held in this div-->
                <div class="login col-lg-2 col-lg-offset-5">
                    <!--Form action is register, this sends the data entered in the form to the register script-->
                    <form action="register.php" method="POST">
                        <!--form elements contained in a form group-->
                        <div class="form-group">
                            <!--glyphicon-->
                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>   
                            <!--username-->
                            <input type="text"
                                   class="contactform"
                                   id ="username"
                                   name="username"
                                   placeholder="Username"
                                   value="<?php if (isset($username)) echo $username; ?>"
                                   />
                            <span id = "usernameError" class="errorlog">
                                <!--If there are errors in the validation they are displayed here-->
                                <?php if (isset($errors['username'])) echo $errors['username']; ?>
                            </span>
                            <!--passsword-->
                            <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                            <input type="password"
                                   class="contactform"
                                   name="password"
                                   id ="password"
                                   placeholder="Password"
                                   value=""
                                   />
                            <span id = "passwordError" class="errorlog">
                                <!--If there are errors in the validation they are displayed here-->
                                <?php if (isset($errors['password'])) echo $errors['password']; ?>
                            </span>
                            <!--confirm password-->
                            <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                            <input type="password"
                                   class="contactform"
                                   name="password2"
                                   id ="password2"
                                   placeholder="Confirm Password"
                                   value=""
                                   />
                            <span id = "password2Error" class="errorlog">
                                <!--If there are errors in the validation they are displayed here-->
                                <?php if (isset($errors['password2'])) echo $errors['password2']; ?>
                            </span>
                        </div>
                        <!--submit button-->
                        <input type="submit" id = "Register" class = "login-btnspcing form-btn" value="Register" />
                        <!--link to contact page-->
                        <p class="col-lg-1 register"><a href="contact.php">Help</a></p>  
                        <!--link to log in form-->
                        <p class="col-lg-1 col-lg-offset-8 register"><a href="loginForm.php">LogIn</a></p>               
                    </form><!-- closing form  !-->
                </div><!-- closing form elements !--> 
            </div><!--closing form container !--> 
        </div><!-- closing background image div !--> 
        <?php require 'footer.php'; ?> <!--php file that generates the html code for my footer!-->


    </body>
</html>
