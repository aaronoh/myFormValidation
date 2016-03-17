<?php

function echoValue($array, $fieldName) {
    if (isset($array) && isset($array[$fieldName])) {
        echo $array[$fieldName];
    }
}

function validate(&$formdata, &$errors) {
    $input_method = INPUT_POST;

    $formdata["name"] = filter_input($input_method, "name", FILTER_SANITIZE_STRING);
    $formdata["managername"] = filter_input($input_method, "managername", FILTER_SANITIZE_STRING);
    $formdata["address"] = filter_input($input_method, "address", FILTER_SANITIZE_STRING);
    $formdata["email"] = filter_input($input_method, "email", FILTER_SANITIZE_EMAIL);
    $formdata["phone"] = filter_input($input_method, "phone", FILTER_SANITIZE_STRING);
    $formdata["openingdate"] = filter_input($input_method, "openingdate", FILTER_SANITIZE_STRING);
    $formdata["openinghours"] = filter_input($input_method, "openinghours", FILTER_SANITIZE_STRING);


    if ($formdata ['name'] === NULL || $formdata ['name'] === FALSE || $formdata ['name'] === "") {
        $errors['name'] = "Name Required";
    }
    if ($formdata ['managername'] === NULL || $formdata ['managername'] === FALSE || $formdata ['managername'] === "") {
        $errors['managername'] = "Manager Name Required";
    }

    if ($formdata ['address'] === NULL || $formdata ['address'] === FALSE || $formdata ['address'] === "") {
        $errors['address'] = "Address Required";
    }

    if ($formdata ['openingdate'] === NULL || $formdata ['openingdate'] === FALSE || $formdata ['openingdate'] === "") {
        $errors['openingdate'] = "Opening Date Required";
    } else {
        $date_array = explode('-', $formdata['openingdate']);
        if (count($date_array) !== 3 || !checkdate($date_array[1], $date_array[2], $date_array[0])) {
            $errors['openingdate'] = "Invalid Date Format: YYYY-MM-DD expected.";
            print_r($date_array);
        }
    }

    if ($formdata ['email'] !== NULL && $formdata ['email'] !== FALSE && $formdata ['email'] !== "") {
        if (!filter_var($formdata['email'], FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = "Please enter a valid email address";
        }
    }
}

?>