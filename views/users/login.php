<?php require_once '../../core/includes.php';

$_SESSION = array(); // Empty session and start fresh

if( !empty($_POST['username']) && !empty($_POST['password']) ){

    $u= new User;
    $u->login();

header("Location: /projects/index.php?action=view-all");
}
