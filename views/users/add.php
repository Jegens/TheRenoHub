<?php

require_once '../../core/includes.php';

$_SESSION = array(); // Empty session and start fresh

if( !empty($_POST['username']) && !empty($_POST['password']) && !empty($_POST['email']) ){

    $u = new User;

    // CHECK TO SEE IF USER ALREADY EXISTS
    $exists = $u->exists();

    if( empty($exists) ){ // USER DOES NOT EXIST
        $new_user_id = $u->add();
        $_SESSION['user_logged_in'] = $new_user_id;

        header("Location: /");

    }else{
        $_SESSION['create_acc_msg'] = '<p class="text-danger"> *** Username already in use. ***</p>';
        $_SESSION['remember_email'] = $_POST['email']; // REMEMBERS EMAIL IN CASE OF SIGN UP ERROR

        header("Location: /account.php?action=signup&signup_error=username-exists");
    }

}
