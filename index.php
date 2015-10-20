<?php
function setValue($formdata, $fieldName) {
    if (isset($formdata) && isset($formdata[$fieldName])) {
        echo $formdata[$fieldName];
    }
}

function setChecked($formdata, $fieldName, $fieldValue) {
    if (isset($formdata[$fieldName]) && isset($formdata[$fieldName])) {
        if (is_array($formdata[$fieldName]) && in_array($fieldValue, $formdata[$fieldName])){
            echo 'checked = "checked"';
        }
        else if ($formdata[$fieldName] == $fieldValue){
            echo 'checked = "checked"';
        }
    }
}
if(!isset($formdata)) {
    $formdata = array();
}

if(!isset($errors)) {
    $errors = array();
}
?>
    <!DOCTYPE html>
    <!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
    <html>

    <head>
        <meta charset="UTF-8">
        <title></title>
        <style>
            div.container {
                margin: auto;
                width: 960px;
            }
            
            div.row {
                display: block;
                margin-top: 10px;
            }
            
            div.label {
                display: inline-block;
                width: 240px;
                text-align: right;
                padding-right: 5px;
            }
            
            div.control {
                display: inline-block;
                vertical-align: top;
            }
            
            div.error {
                display: inline-block;
                text-align: left;
                padding-left: 5px;
                color: red;
            }
        </style>
    </head>

    <body>
        <form action="process.php" method="post">
            <div class="container">
                <div class="row">
                    <div class="label">
                        <label for="name">Name: </label>
                    </div>
                    <div class="control">
                        <input type="text" name="name" id="name" value="<?php setValue ($formdata, 'name'); ?>" />
                    </div>
                    <div class="error">
                        <span id="nameError">
                            <?php if(isset($errors['name'])) echo $errors['name']; ?>
                            
                        </span>
                    </div>
                </div>

                <div class="row">
                    <div class="label">
                        <label for="password">Password: </label>
                    </div>
                    <div class="control">
                        <input type="password" name="password" id="password" />
                    </div>
                    <div class="error">
                        <span id="passwordError">
                            <?php if(isset($errors['password'])) echo $errors['password']; ?>
                        </span>
                    </div>
                </div>

                <div class="row">
                    <div class="label">
                        <label for="email"> eMail: </label>
                    </div>
                    <div class="control">
                        <input type="email" name="email" id="email" value="<?php setValue ($formdata, 'email'); ?>" />
                    </div>
                    <div class="error">
                        <span id="emailError">
                                <?php if(isset($errors['email'])) echo $errors['email']; ?>
                            </span>
                    </div>
                </div>
                <div class="row">
                    <div class="label">
                        <label for="dob"> Date of Birth: (dd/mm/yyyy) </label>
                    </div>
                    <div class="control">
                        <input type="date" name="dob" id="dob" value="<?php setValue ($formdata, 'dob'); ?>" />
                    </div>
                    <div class="error">
                        <span id="dobError">
                                   <?php if(isset($errors['dob'])) echo $errors['dob']; ?>
                               </span>
                    </div>
                </div>

                <div class="row">
                    <div class="label">
                        <label> Platform: </label>
                    </div>
                    <input type="checkbox" name="platform[]" value="Steam" id="Steam" <?php setChecked($formdata, 'platform', 'Steam') ?> />
                    <label for="Steam">Steam</label>
                    <input type="checkbox" name="platform[]" value="PSN" id="PSN" <?php setChecked($formdata, 'platform', 'PSN') ?> />
                    <label for="PSN">PSN</label>
                    <input type="checkbox" name="platform[]" value="Android" id="Android" <?php setChecked($formdata, 'platform', 'Android') ?> />
                    <label for="Android">Android</label>
                    <input type="checkbox" name="platform[]" value="iOS" id="iOS" <?php setChecked($formdata, 'platform', 'iOS') ?> />
                    <label for="iOS">iOS</label>

                    <div class="error">
                        <span id="platformError">
                            <?php if(isset($errors['platform'])) echo $errors['platform']; ?>
                        </span>
                    </div>
                </div>
                <div class="row">
                    <div class="label">
                        <label> Newsletter? </label>
                    </div>
                    <input type="radio" name="newsletter" value="Yes" id="Yes" <?php setChecked($formdata, 'newsletter', 'Yes') ?> />
                    <label for="Yes"> Yes</label>
                    <input type="radio" name="newsletter" value="No" id="No" <?php setChecked($formdata, 'newsletter', 'No') ?> />
                    <label for="No"> No</label>
                    <div class="error">
                        <span id="newsletterError">
                            <?php if(isset($errors['newsletter'])) echo $errors['newsletter']; ?>
                        </span>
                    </div>
                </div>
                <div class="row">
                    <div class="label">
                        <label for="avatar"> Avatar: </label>
                    </div>
                    <input type="file" id="avatar" name="avatar" />
                    <div class="error">
                        <span id="avatarError">
                                <?php if(isset($errors['avatar'])) echo $errors['avatar']; ?>
                            </span>
                    </div>
                </div>



                <div class="row">
                    <div class="label"></div>
                    <div class="control">
                        <input type="submit" name="submit" value="Submit" />
                    </div>
                </div>
            </div>
        </form>
    </body>

    </html>