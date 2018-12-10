
<?php

    function is_current_page($slug){

        if( $_SERVER['REQUEST_URI'] === '/' && $slug === '/' ){ //Checking to see if on home page
            echo 'active';
        }else if( substr($_SERVER['REQUEST_URI'], 0, strlen($slug)) === $slug && $slug !== '/' ){
            echo 'active';
        }
    }

?>

<nav class="navbar navbar-expand-lg navbar-light">
    <a class="navbar-brand" href="#"><img src="/assets/images/the-reno-logo.png"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mx-auto">
            <li class="nav-item <?php is_current_page('/'); ?>">
                <a class="nav-link central" href="/">HOME</a>
            </li>
            <li class="nav-item dropdown <?php is_current_page('/projects/index.php'); ?>">
                <a class="nav-link central dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">RENOS</a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="/projects/index.php?action=view-all">View All</a>
                    <?php
                    // Check if user is logged in - Show profile links
                        if( $_SESSION['user_logged_in'] ){

                            $u = new User;
                            $user = $u->get_by_id($_SESSION['user_logged_in']);
                    ?>
                        <a class="dropdown-item" href="/projects/index.php?action=view-my-renos">My Renos</a>
                        <a class="dropdown-item" href="/projects/post.php?action=create-post">Create Reno</a>
                    <?php }else{ // User not logged in ?>
                    <?php } ?>

                </div><!-- . dropdown-menu -->
            </li>

<!-- ******** DISPLAYS THE PROFILE DROPDOWN IF USER IS LOGGED IN ******** -->
        <?php
        // Check if user is logged in - Show profile links
            if( $_SESSION['user_logged_in'] ){

                $u = new User;
                $user = $u->get_by_id($_SESSION['user_logged_in']);
        ?>

                <li class="nav-item dropdown">
                    <a id="user-dropdown" class="nav-link central dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?=$user['username']?></a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="/users/profile.php?action=view-profile">My Profile</a>
                        <a class="dropdown-item" href="/users/profile.php?action=edit-profile">Edit Profile</a>
                    </div><!-- . dropdown-menu -->
                </li>

            <?php }else{ // User not logged in ?>
            <?php } ?>
        </ul>


        <ul class="navbar-nav ml-auto">
            <form class="form-inline search-group" method="get" action="/projects/index.php">
                <input type="hidden" name="action" value="view-all">
                <input class="form-control search-field" name="search" type="text" aria-label="Search">
                <button class="search-submit" type="submit"><i class="fas fa-search"></i></button>
            </form>

            <?php
            // Check if user is logged in - Show profile links
                if( $_SESSION['user_logged_in'] ){

                    $u = new User;
                    $user = $u->get_by_id($_SESSION['user_logged_in']);

            ?>

                <li id="logout-link" class="nav-item <?php is_current_page('/'); ?>">
                    <a class="nav-link log-out" href="/users/logout.php">LOG OUT</a>
                </li>

            <?php }else{ // User not logged in ?>

                <li id="login-link" class="nav-item <?php is_current_page('/'); ?>">
                    <a class="nav-link" href="/users/index.php?action=login"><i class="fas fa-lock"></i>  LOG IN</a>
                </li>
                <li id="signin-link" class="nav-item <?php is_current_page('/'); ?>">
                    <a class="nav-link sign-up" href="/users/index.php?action=signup"><i class="fas fa-lock"></i>  SIGN UP</a>
                </li>

            <?php } ?>
        </ul>
    </div>
</nav>
