

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


//Display error function

function validation_errors($error_message) {

    $error_message = <<<DELIMETER
                <div class="alert alert-danger alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Warning!</strong>  $error_message
  </div>
DELIMETER;

    return $error_message;


}


function email_exists($email){

    $sql = "SELECT id FROM users WHERE email = '$email'";

    $result = query($sql);

    if(row_count($result) == 1 ) {
        return true;
    } else {

        return false;
    }
}

function username_exists($username){

    $sql = "SELECT id FROM users WHERE username = '$username'";

    $result = query($sql);

    if(row_count($result) == 1 ) {
        return true;
    } else {

        return false;
    }
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

        if(strlen($first_name ) > $max) {

            $errors[] = "Your last name can't be more than {$max} characters";
        }

        if(strlen($last_name) < $min) {

            $errors[] = "Your last name can't be less then {$min} characters";
        }

        if(strlen($last_name) > $max) {

            $errors[] = "Your last name can't be more than {$max} characters";
        }

        if(strlen($username) < $min) {

            $errors[] = "Your username name can't be less then {$min} characters";
        }
        if(strlen($username) > $max) {

            $errors[] = "Your username name can't be more than {$max} characters";
        }

        if(username_exists($username)) {
            $errors[] = "Sorry that username already exists, think of another one";
        }

        if(email_exists($email)) {
            $errors[] = "Sorry that email already exists";
        }

        if(strlen($email) > $min) {

            $errors[] = "Your email can't be less than {$min} characters";
        }

        if($password !== $confirm_password) {

            $errors[] = "Your password don't match";
        }

if(!empty($errors)) {

            foreach ($errors as $error) {

// Error display
              echo validation_errors($error);

            }

}
    }













}