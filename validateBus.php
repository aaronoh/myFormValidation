<?php

function echoValue($array, $fieldName) {
    if (isset($array) && isset($array[$fieldName])) {
        echo $array[$fieldName];
    }
}

function validate(&$formdata, &$errors) {
    $input_method = INPUT_POST;

    $formdata["reg"] = filter_input($input_method, "reg", FILTER_SANITIZE_STRING);
    $formdata["make"] = filter_input($input_method, "make", FILTER_SANITIZE_STRING);
    $formdata["model"] = filter_input($input_method, "model", FILTER_SANITIZE_STRING);
    $formdata["capacity"] = filter_input($input_method, "capacity", FILTER_SANITIZE_NUMBER_INT);
    $formdata["engineSize"] = filter_input($input_method, "engineSize", FILTER_SANITIZE_STRING);
    $formdata["purchaseDate"] = filter_input($input_method, "purchaseDate", FILTER_SANITIZE_STRING);
    $formdata["openinghours"] = filter_input($input_method, "openinghours", FILTER_SANITIZE_STRING);
    $formdata["serviceDate"] = filter_input($input_method, "serviceDate", FILTER_SANITIZE_STRING);
    $formdata["gid"] = filter_input($input_method, "gid", FILTER_SANITIZE_NUMBER_INT);

    if ($formdata ['reg'] === NULL || $formdata ['reg'] === FALSE || $formdata ['reg'] === "") {
        $errors['reg'] = "Reg Required";
    }
    if ($formdata ['make'] === NULL || $formdata ['make'] === FALSE || $formdata ['make'] === "") {
        $errors['make'] = "Make Required";
    }

    if ($formdata ['model'] === NULL || $formdata ['model'] === FALSE || $formdata ['model'] === "") {
        $errors['model'] = "Model Required";
    }

    if ($formdata ['capacity'] === NULL || $formdata ['capacity'] === FALSE || $formdata ['capacity'] === "") {
        $errors['capacity'] = "Capacity Required";
    }

    if ($formdata ['purchaseDate'] === NULL || $formdata ['purchaseDate'] === FALSE || $formdata ['purchaseDate'] === "") {
        $errors['purchaseDate'] = "Purchase Date Required";
    } else {
        $date_array = explode('-', $formdata['purchaseDate']);
        if (count($date_array) !== 3 || !checkdate($date_array[1], $date_array[2], $date_array[0])) {
            $errors['purchaseDate'] = "Invalid Date Format: YYYY-MM-DD expected.";
            print_r($date_array);
        }
    }

    if ($formdata ['serviceDate'] === NULL || $formdata ['serviceDate'] === FALSE || $formdata ['serviceDate'] === "") {
        $errors['serviceDate'] = "Service Date Required";
    } else {
        $date_array = explode('-', $formdata['serviceDate']);
        if (count($date_array) !== 3 || !checkdate($date_array[1], $date_array[2], $date_array[0])) {
            $errors['serviceDate'] = "Invalid Date Format: YYYY-MM-DD expected.";
            print_r($date_array);
        }
    }

    if ($formdata ['gid'] === NULL || $formdata ['gid'] === FALSE || $formdata ['gid'] === "") {
        $errors['gid'] = "Garage ID Required";
    }
}

?>