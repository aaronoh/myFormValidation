            <?php
            $input_method = INPUT_POST;
            $formdata = array();
            $errors = array();
            
            $formdata["name"] = filter_input( $input_method, "name", FILTER_SANITIZE_STRING);
            $formdata["mname"] = filter_input( $input_method, "mname", FILTER_SANITIZE_STRING);
            $formdata["address"] = filter_input( $input_method, "address", FILTER_SANITIZE_STRING);
            $formdata["email"] = filter_input( $input_method, "email", FILTER_SANITIZE_EMAIL);
            $formdata["phone"] = filter_input( $input_method, "phone", FILTER_SANITIZE_STRING);
            $formdata["opdate"] = filter_input( $input_method, "opdate", FILTER_SANITIZE_STRING);
            $formdata["ophrs"] = filter_input( $input_method, "ophrs", FILTER_SANITIZE_STRING);
            $formdata["latenight"] = filter_input( $input_method, "latenight", FILTER_SANITIZE_STRING);
            $formdata["facilities"] = filter_input( $input_method, "facilities", FILTER_SANITIZE_STRING, FILTER_REQUIRE_ARRAY);
            
            if($formdata ['name'] === NULL || $formdata ['name'] === FALSE || $formdata ['name'] === ""){
                $errors['name'] = "Name Required";
            }
             if($formdata ['mname'] === NULL || $formdata ['mname'] === FALSE || $formdata ['mname'] === ""){
                $errors['mname'] = "Manager Name Required";
            }
            
            if($formdata ['address'] === NULL || $formdata ['address'] === FALSE || $formdata ['address'] === ""){
                $errors['address'] = "Address Required";
            }
            
            if($formdata ['opdate'] !== NULL && $formdata ['opdate'] !== FALSE && $formdata ['opdate'] !== ""){
                $date_array = explode('-', $formdata['opdate']);
                if (count($date_array) !== 3 || !checkdate($date_array[1], $date_array[2], $date_array[0])) {
                       $errors['opdate'] = "Invalid Date Format: YYYY-MM-DD expected.";
                        print_r($date_array);
                }
            }
            
            if($formdata ['email'] !== NULL && $formdata ['email'] !== FALSE && $formdata ['email'] !== ""){
                if(!filter_var($formdata['email'], FILTER_VALIDATE_EMAIL)){
                    $errors['email'] = "Please enter a valid email address";
                }
            }
            
            if($formdata ['latenight'] !== NULL && $formdata ['latenight'] !== FALSE && $formdata ['latenight'] !== ""){
                $validNewsLetter = array ("Yes", "No");
                    if (!in_array($formdata['latenight'], $validNewsLetter)) {
                        $errors['latenight'] = "Invalid Answer (Yes/No)";
                    }
            }
            
             if($formdata ['facilities'] !== NULL && $formdata ['facilities'] !== FALSE && $formdata ['facilities'] !== ""){
                $validPlatforms = array ("WiFi", "toilets", "cafeteria");
                   foreach ($formdata['facilities'] as $platform ) {
                    if (!in_array($platform, $validPlatforms)) {
                        $errors['facilities'] = "Invalid Facility";
                        break;
                    }
                  }
                }
            
          
         
           if(empty($errors)){
               require 'validateGarage.php';
               
           }
           else{
               require 'createGarageForm.php';
           }
        ?>
            
       