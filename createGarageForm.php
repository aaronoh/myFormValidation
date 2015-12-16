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
        <script src="validate.js"></script>
    </head>

    <body>
        <h1>Create Garage Form</h1>
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
                
                  <div class="container">
                <div class="row">
                    <div class="label">
                        <label for="name">Manager Name: </label>
                    </div>
                    <div class="control">
                        <input type="text" name="mname" id="mname" value="<?php setValue ($formdata, 'mname'); ?>" />
                    </div>
                    <div class="error">
                        <span id="mnameError">
                            <?php if(isset($errors['mname'])) echo $errors['mname']; ?>
                            
                        </span>
                    </div>
                </div>

                <div class="row">
                    <div class="label">
                        <label for="address">Address: </label>
                    </div>
                    <div class="control">
                        <input type="text" name="address" id="address" value="<?php setValue ($formdata, 'address'); ?>" />
                    </div>
                    <div class="error">
                        <span id="addressError">
                            <?php if(isset($errors['address'])) echo $errors['address']; ?>
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
                        <label for="phone"> Phone: </label>
                    </div>
                    <div class="control">
                        <input type="text" name="phone" id="phone" value="<?php setValue ($formdata, 'phone'); ?>" />
                    </div>
                    <div class="error">
                        <span id="phoneError">
                                <?php if(isset($errors['phone'])) echo $errors['phone']; ?>
                            </span>
                    </div>
                </div>
                   <div class="row">
                    <div class="label">
                        <label for="ophrs"> Opening Hours: </label>
                    </div>
                    <div class="control">
                        <input type="text" name="ophrs" id="ophrs" value="<?php setValue ($formdata, 'ophrs'); ?>" />
                    </div>
                    <div class="error">
                        <span id="ophrsError">
                                <?php if(isset($errors['ophrs'])) echo $errors['ophrs']; ?>
                            </span>
                    </div>
                </div>
                <div class="row">
                    <div class="label">
                        <label for="opdate"> Opening Date: (YYYY-MM-DD) </label>
                    </div>
                    <div class="control">
                        <input type="text" name="opdate" id="opdate" value="<?php setValue ($formdata, 'opdate'); ?>" />
                    </div>
                    <div class="error">
                        <span id="opdateError">
                                   <?php if(isset($errors['opdate'])) echo $errors['opdate']; ?>
                               </span>
                    </div>
                </div>

                <div class="row">
                    <div class="label">
                        <label> Facilities: </label>
                    </div>
                    <input type="checkbox" name="facilities[]" value="WiFi" id="Steam" <?php setChecked($formdata, 'facilities', 'WiFi') ?> />
                    <label for="Steam">WiFi</label>
                    <input type="checkbox" name="facilities[]" value="toilets" id="toilets" <?php setChecked($formdata, 'facilities', 'toilets') ?> />
                    <label for="toilets">Toilets</label>
                    <input type="checkbox" name="facilities[]" value="cafeteria" id="Android" <?php setChecked($formdata, 'facilities', 'cafeteria') ?> />
                    <label for="cafeteria">Cafeteria</label>

                    <div class="error">
                        <span id="facilitiesError">
                            <?php if(isset($errors['facilities'])) echo $errors['facilities']; ?>
                        </span>
                    </div>
                </div>
                <div class="row">
                    <div class="label">
                        <label>LateNight?  </label>
                    </div>
                    <input type="radio" name="latenight" value="Yes" id="Yes" <?php setChecked($formdata, 'latenight', 'Yes') ?> />
                    <label for="Yes"> Yes</label>
                    <input type="radio" name="latenight" value="No" id="No" <?php setChecked($formdata, 'latenight', 'No') ?> />
                    <label for="No"> No</label>
                    <div class="error">
                        <span id="latenightError">
                            <?php if(isset($errors['latenight'])) echo $errors['latenight']; ?>
                        </span>
                    </div>
                </div>
<!--                <div class="row">
                    <div class="label">
                        <label for="image"> Image: </label>
                    </div>
                    <input type="file" id="image" name="image" />
                    <div class="error">
                        <span id="imageError">
                                <?php if(isset($errors['image'])) echo $errors['image']; ?>
                            </span>
                    </div>
                </div>-->



                <div class="row">
                    <div class="label"></div>
                    <div class="control">
                        <input type="submit" name="submit" value="Submit" id="submit" />
                    </div>
                </div>
            </div>
        </form>
    </body>

    </html>