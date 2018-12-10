<?php
// For functionality like checking if a user is an admin before page is loaded

if( empty($_SESSION['user_logged_in']) ){ // If not logged in

    $util = new Util;

    // Allowed logged out functionality
    $allowed_urls = array(
        '/',
        '/users/add.php',
        '/users/login.php',
        '/users/index.php?action=signup',
        '/users/index.php?action=login',
        '/projects/index.php?action=view-all',
        '/projects/index.php?action=view-all&search=kitchen',
        '/projects/index.php?action=view-all&search=bathroom',
        '/projects/index.php?action=view-all&search=bedroom',
        '/projects/index.php?action=view-all&search=dining+room',
        '/projects/index.php?action=view-all&search=living+room'
    );

    $allowed = false;

    foreach($allowed_urls as $allowed_url) {
        if( $_SERVER['REQUEST_URI'] == $allowed_url || $_SERVER['REQUEST_URI'] == $util->startsWith($_SERVER['REQUEST_URI'], '/users/profile.php?action=view-post-user&id=') || $_SERVER['REQUEST_URI'] == $util->startsWith($_SERVER['REQUEST_URI'], '/projects/post.php?action=view-post&id=') ){
            $allowed = true;
            break;
        }
    }

    if( $allowed === false ){
        header("Location: /");
        exit();
    }

}else{ // If user is logged in

    // Set users TimeZone
    $u = new User;
    $user = $u->get_by_id($_SESSION['user_logged_in']);

    date_default_timezone_set($user['timezone']);

}
