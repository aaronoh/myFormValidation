            <?php
            print_r($_POST);
            $input_method = INPUT_POST;
            $formdata = array();
            $errors = array();
            
            $formdata["name"] = filter_input( $input_method, "name", FILTER_SANITIZE_STRING);
            $formdata["address"] = filter_input( $input_method, "address", FILTER_SANITIZE_STRING);
            $formdata["email"] = filter_input( $input_method, "email", FILTER_SANITIZE_EMAIL);
            $formdata["opdate"] = filter_input( $input_method, "opdate", FILTER_SANITIZE_STRING);
            $formdata["newsletter"] = filter_input( $input_method, "newsletter", FILTER_SANITIZE_STRING);
            $formdata["platform"] = filter_input( $input_method, "platform", FILTER_SANITIZE_STRING, FILTER_REQUIRE_ARRAY);
            $formdata["avatar"] = filter_input( $input_method, "avatar", FILTER_SANITIZE_STRING);
            
            if($formdata ['name'] === NULL || $formdata ['name'] === FALSE || $formdata ['name'] === ""){
                $errors['name'] = "Name Required";
            }
            
            if($formdata ['address'] === NULL || $formdata ['address'] === FALSE || $formdata ['address'] === ""){
                $errors['address'] = "address Required";
            }
            
            if($formdata ['opdate'] !== NULL && $formdata ['opdate'] !== FALSE && $formdata ['opdate'] !== ""){
                $date_array = explode('/', $formdata['opdate']);
                if (count($date_array) !== 3 || !checkdate($date_array[1], $date_array[0], $date_array[2])){
                       $errors['opdate'] = "Invalid Date Format: dd/mm/yyyy expected.";
                }
            }
            
            if($formdata ['email'] !== NULL && $formdata ['email'] !== FALSE && $formdata ['email'] !== ""){
                if(!filter_var($formdata['email'], FILTER_VALIDATE_EMAIL)){
                    $errors['email'] = "Please enter a valid email address";
                }
            }
            
            if($formdata ['newsletter'] !== NULL && $formdata ['newsletter'] !== FALSE && $formdata ['newsletter'] !== ""){
                $validNewsLetter = array ("Yes", "No");
                    if (!in_array($formdata['newsletter'], $validNewsLetter)) {
                        $errors['newsletter'] = "Invalid Answer (Yes/No)";
                    }
            }
            
             if($formdata ['platform'] !== NULL && $formdata ['platform'] !== FALSE && $formdata ['platform'] !== ""){
                $validPlatforms = array ("Steam", "PSN", "Android", "iOS");
                   foreach ($formdata['platform'] as $platform ) {
                    if (!in_array($platform, $validPlatforms)) {
                        $errors['platform'] = "Invalid Platform";
                        break;
                    }
                  }
                }
            
          
         
           if(empty($errors)){
               require 'response.php';
               
           }
           else{
               
               require 'index.php';
           }
        ?>
            
       