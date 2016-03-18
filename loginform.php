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
        <!--Login form contained in this div, background image set in this div-->
        <div class="jumbotronlogin">
            <!--clearfix to fix whitespace issues (top)-->
            <div class="clearfix"></div>
            <!--form contained in this div-->
            <div class="loginform">
                <!--page header-->
                <h1 class = " loginheader col-lg-2 col-lg-offset-5">Pilot Tours</h1>
                <!--form elements held in this div-->
                <div class="login col-lg-2 col-lg-offset-5">
                    <!--Form action is login, this sends the data entered in the form to the log in script-->
                    <form action="login.php" method="POST">
                        <!--form elements contained in a form group-->
                        <div class="form-group">
                            <!--glyphicon-->
                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>   
                            <!--username-->
                            <input type="text"
                                   class="contactform"
                                   name="username"
                                   id ="username"
                                   placeholder="Username"
                                   <!--sets the value to the entered data if validation fails, saves user from having to retype data-->
                                   value="<?php if (isset($formdata['username'])) echo $formdata['username']; ?>"
                                   />
                                   <span id = "usernameError" class="errorlog">
                                <!--If there are errors in the validation they are displayed here-->
                                <?php if (isset($errors['username'])) echo $errors['username']; ?>
                            </span>
                            <!--password-->
                            <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                            <input type="password"
                                   class="contactform"
                                   id ="password"
                                   name="password"
                                   placeholder="Password"
                                   value=""
                                   />
                            <span id = "passwordError" class="errorlog">
                                <!--If there are errors in the validation they are displayed here-->
                                <?php if (isset($errors['password'])) echo $errors['password']; ?>
                            </span>
                        </div>
                        <!--submit button-->
                        <input type="submit"class = "login-btnspcing form-btn" id ="Login" value="Login" />
                        <!--link to contact page-->
                        <p class="col-lg-1 register"><a href="contact.php">Help</a></p>  
                        <!--link to register form-->
                        <p class="col-lg-1 col-lg-offset-8 register"><a href="registerForm.php">Register</a></p>

                    </form><!-- closing form  !-->
                </div> <!-- closing form elements !--> 
            </div><!--closing form container !--> 
        </div><!-- closing background image div !--> 
        <?php require 'footer.php'; ?> <!--php file that generates the html code for my footer!-->
    </body>
</html>
