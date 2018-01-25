

<?php

///*********** Helpeedr ************/
function clean($string){

    return htmlentities($string);


}

function redirect($location){

    return header("Location: {$location}");

}



//ti create messages so we can se it anywhere on our site

function set_messages ($message){

if (!empty($message)) {

    $_SESSION['message'] = $message;
} else {

    $message = "";
    }
}


function display_message(){

    if(isset($_SESSION['message']));

    echo $_SESSION['message'];
    unset($_SESSION['message']);
}



//a token generator function for security

function token_generator(){

    $token = $_SESSION['token'] =  md5(uniqid(mt_rand(), true));

    return $token;

}

///******************* validating functions ****************/

function validate_user_registration(){

    $errors = [];
    $min = 3;
    $max = 20;


    if ($_SERVER['REQUEST_METHOD'] == "POST") {

        $first_name                    = clean($_POST['first_name']);
        $last_name                     = clean($_POST['last_name']);
        $username                      = clean($_POST['username']);
        $email                         = clean($_POST['email']);
        $password                      = clean($_POST['password']);
        $confirm_password              = clean($_POST['confirm_password']);


        if(strlen($first_name) < $min) {

            $errors[] = "Your first name can't be less then {$min} characters";
        }

        if(strlen($last_name) < $min) {

            $errors[] = "Your last name can't be less then {$min} characters";
        }

if(!empty($errors)) {

            foreach ($errors as $error) {

                echo $error;
            }

}
    }













}