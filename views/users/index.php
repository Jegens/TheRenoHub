<?php  require_once '../../core/includes.php';
    // unique html head vars
    $title = 'Login Page';
    require_once '../../elements/html_head.php';

?>

<!-- ******** SIGN UP SECTION ******** -->
<div id="signup-container" class="section-container" style="<?=$_GET['action']=='signup' ? 'display: block;' : 'display: none;'?>">
    <div class="container">
        <div id="signup-wrapper" class="row">
            <div class="col-md-7">
                <div class="signup-wrap">
                    <div id="signup-section">
                        <h1>SIGN UP</h1>

                        <!-- . Displays Signup Message -->
                        <?= !empty($_SESSION['create_acc_msg']) ? $_SESSION['create_acc_msg']: '' ?>

                        <form class="account-form" action="/users/add.php" method="post">
                            <div class="form-group">
                                <label>Username</label>
                                <input class="form-control field" type="text" name="username" required>
                            </div><!-- .form-group -->
                            <div class="form-group">
                                <label>Email</label>
                                <input class="form-control field" type="email" name="email" value="<?= $_GET['signup_error'] == 'username-exists' ? $_SESSION['remember_email'] : ''?>" required>
                            </div><!-- .form-group -->
                            <div class="form-group">
                                <label>Password</label>
                                <input class="form-control field" type="password" name="password" required>
                            </div><!-- .form-group -->
                            <input class="form-btn" type="submit" name="singup" value="SIGN UP">
                        </form><!-- .account-form -->
                    </div><!-- .signup-section -->
                </div><!-- .signup-wrap -->
            </div><!-- .col-md-7 -->

            <div id="signup-close">
                <a href="/"><i class="fas fa-home"></i></a>
            </div>

            <div class="col-md-5">
                <div id="login-alt-section">
                    <img src="/assets/images-resized/white-logo.png" alt="the-reno-logo-white-variation">
                    <p class="title">Have an account?</p>
                    <p>What are you waiting for? Log in and start working on your reno posts or search for inspiration for your new project! </p>
                    <button id="login-alt-btn" class="alt-btn">LOG IN</button>
                </div><!-- .login-alt-section -->
            </div><!-- .col-md-5 -->
        </div><!-- .signup-wrapper -->
    </div><!-- .container -->
</div><!-- #signup-container .section-container -->

<!-- ******** LOG IN SECTION ******** -->
<div id="login-container" class="section-container" style="<?=$_GET['action']=='login' ? 'display: block;' : 'display: none;'?>">
    <div class="container">
        <div id="login-wrapper" class="row">
            <div class="col-md-5">
                <div id="signup-alt-section">
                    <img src="/assets/images-resized/white-logo.png" alt="the-reno-logo-white-variation">
                    <p class="title">Don't have an account?</p>
                    <p>Don't waste another moment. Become a member in order to post your renos and inspire others to take on the reno challenge! </p>
                    <button id="signup-alt-btn" class="alt-btn">SIGN UP</button>
                </div><!-- .signup-alt-section -->
            </div><!-- .col-md-5 -->

            <div id="login-close">
                <a href="/"><i class="fas fa-home"></i></a>
            </div>

            <div class="col-md-7">
                <div class="login-wrap">
                    <div id="login-section">
                        <h1>LOG IN</h1>

                        <!-- . Displays Login Message -->
                        <?=!empty($_SESSION['login_attempt_msg']) ? $_SESSION['login_attempt_msg'] : ''?>

                        <form class="account-form" action="/users/login.php" method="post">
                            <div class="form-group">
                                <label>Username</label>
                                <input class="form-control field" type="text" name="username" required>
                            </div><!-- .form-group -->
                            <div class="form-group">
                                <label>Password</label>
                                <input class="form-control field" type="password" name="password" required>
                            </div><!-- .form-group -->
                            <input class="form-btn" type="submit" name="singup" value="LOG IN">
                        </form><!-- .account-form -->
                    </div><!-- .login-section -->
                </div><!-- .login-wrap -->
            </div><!-- .col-md-7 -->
        </div><!-- .login-wrapper -->
    </div><!-- .container -->
</div><!-- #login-container .section-container -->

<?php require_once '../../elements/footer.php';
