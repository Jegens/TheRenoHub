<?php  require_once '../../core/includes.php';
    // unique html head vars
    $title = 'Profile Page';
    require_once '../../elements/html_head.php';

?>

<!-- ******** DISPLAYS THE PROFILE IF USER IS LOGGED IN ******** -->

<?php

    $u = new User;

    if ($_GET['action'] == 'view-post-user' && !empty($_GET['id'])) {
        $user_id = $_GET['id'];
    }else{
        $user_id = $_SESSION['user_logged_in'];
    }

    $user = $u->get_by_id($user_id); // Show profile info
?>

<?php
if( $_GET['action']=='view-profile' ){ ?>
<!-- ******** VIEW PROFILE SECTION ******** -->

<div id="view-profile-section" class="profile-container mx-auto">
    <div class="row">
        <div class="col-sm-12 backdrop">
        </div><!-- .col-sm-12 backdrop -->
    </div><!-- .row -->
    <div class="container profile-wrap">
        <div id="back-to-home">
            <a href="/"><i class="fas fa-home"></i></a>
        </div>
        <div class="row">
            <div class="col-md-12 profile-wrap">
                <h1 class="text-center"><?=$user['username']?></h1>
            </div><!-- .col-md-12 -->
        </div><!-- .row -->
        <div class="row mr-5">
            <div class="col-md-6">
                <div class="ml-5">
                    <div>
                        <h4>First Name</h4>
                        <p><?=$user['firstname']?></p>
                        <hr>
                    </div>
                    <div>
                        <h4>Last Name</h4>
                        <p><?=$user['lastname']?></p>
                        <hr>
                    </div>
                    <div>
                        <h4>Age</h4>
                        <p><?=$user['age']?></p>
                    </div>
                    <hr>
                    <div>
                        <h4>Occupation</h4>
                        <p><?=$user['occupation']?></p>
                        <hr>
                    </div>
                    <div>
                        <h4>Location</h4>
                        <p><?=$user['location']?></p>
                        <hr>
                    </div>
                </div>
            </div><!-- .col-md-6 -->
            <div class="col-md-6 profile-right-pane">
                <div class="profile-pic mx-auto">
                    <img class="img-fluid" src="/assets/files/<?=!empty(trim($user['profile_pic'])) ? $user['profile_pic'] : 'profile-photo-generic.jpg' ?>" alt="Profile Pic">
                </div><!-- .profile-pic -->
                <div>
                    <h4>Posts</h4>
                    <p>
                        <?php
                        $renos_count = $u->count_renos($user_id);
                        echo $renos_count;
                        ?>
                    </p>
                    <hr>
                </div>
                <div>
                    <h4>Member since</h4>
                    <p><?=date('M j. Y', $user['member_since'])?></p>
                    <hr>
                </div>
            </div><!-- .col-md-6 -->
        </div><!-- .row -->
        <div class="row">
            <div class="col-md-12">
                <a class="edit-btn mx-auto" href="/users/profile.php?action=edit-profile">EDIT PROFILE</a>
            </div><!-- .col-md-12 -->
        </div><!-- .row -->
    </div><!-- .container -->
</div><!-- #view-profile-section -->

<?php
}
?>


<?php
if( $_GET['action']=='view-post-user' ){ ?>
<!-- ******** VIEW POST USER ******** -->


<div id="view-profile-section" class="profile-container mx-auto">
    <div class="row">
        <div class="col-sm-12 backdrop">
        </div><!-- .col-sm-12 backdrop -->
    </div><!-- .row -->
    <div class="container profile-wrap">
        <div id="back-to-home">
            <a href="/"><i class="fas fa-home"></i></a>
        </div>
        <div class="row">
            <div class="col-md-12 profile-wrap">
                <h1 class="text-center"><?=$user['username']?></h1>
            </div><!-- .col-md-12 -->
        </div><!-- .row -->
        <div class="row mr-5">
            <div class="col-md-6">
                <div class="ml-5">
                    <div>
                        <h4>First Name</h4>
                        <p><?=$user['firstname']?></p>
                        <hr>
                    </div>
                    <div>
                        <h4>Last Name</h4>
                        <p><?=$user['lastname']?></p>
                        <hr>
                    </div>
                    <div>
                        <h4>Age</h4>
                        <p><?=$user['age']?></p>
                    </div>
                    <hr>
                    <div>
                        <h4>Occupation</h4>
                        <p><?=$user['occupation']?></p>
                        <hr>
                    </div>
                    <div>
                        <h4>Location</h4>
                        <p><?=$user['location']?></p>
                        <hr>
                    </div>
                </div>
            </div><!-- .col-md-6 -->
            <div class="col-md-6 profile-right-pane">
                <div class="profile-pic mx-auto">
                    <img class="img-fluid" src="/assets/files/<?=!empty(trim($user['profile_pic'])) ? $user['profile_pic'] : 'profile-photo-generic.jpg' ?>" alt="Profile Pic">
                </div><!-- .profile-pic -->
                <div>
                    <h4>Posts</h4>
                    <p>
                        <?php
                        $renos_count = $u->count_renos($user_id);
                        echo $renos_count;
                        ?>
                    </p>
                    <hr>
                </div>
                <div>
                    <h4>Member since</h4>
                    <p><?=date('M j. Y', $user['member_since'])?></p>
                    <hr>
                </div>
            </div><!-- .col-md-6 -->
        </div><!-- .row -->
        <div class="row">
            <div class="col-sm-12">
                <a class="btr-button" href="/projects/index.php?action=view-all">BACK TO RENOS</a>
            </div><!-- .col-sm-12 -->
        </div><!-- .row -->
    </div><!-- .container -->
</div><!-- #view-profile-section -->

<?php
}
?>


<?php
if( $_GET['action']=='edit-profile' ){ ?>
<!-- ******** EDIT PROFILE SECTION ******** -->

<div id="edit-profile-section" class="profile-container mx-auto">
    <div class="row">
        <div class="col-sm-12 backdrop">
        </div><!-- .col-sm-12 backdrop -->
    </div><!-- .row -->
    <div class="container profile-wrap">

        <div id="back-to-home">
            <a href="/"><i class="fas fa-home"></i></a>
        </div>

        <div id="back-to-view">
            <a href="/users/profile.php?action=view-profile"><i class="fas fa-undo-alt"></i></a>
        </div>

        <div class="row">
            <div class="col-md-12 profile-wrap mx-auto">
                <h1 class="text-center">EDIT PROFILE</h1>
            </div><!-- .col-md-12 -->
        </div><!-- .row -->
        <form id="edit-user-form" action="/users/edit.php" method="post" enctype="multipart/form-data">
            <div class="row mr-5">
                <div class="col-md-6">
                    <div class="ml-5">
                        <div class="form-group">
                            <label>First Name</label>
                            <input type="text" name="firstname" value="<?=$user['firstname']?>" placeholder="***">
                            <hr>
                        </div><!-- .form-group -->
                        <div class="form-group">
                            <label>Last Name</label>
                            <input type="text" name="lastname" value="<?=$user['lastname']?>" placeholder="***">
                            <hr>
                        </div><!-- .form-group -->
                        <div class="form-group">
                            <label>Age</label>
                            <input type="text" name="age" value="<?=$user['age']?>" placeholder="***">
                            <hr>
                        </div><!-- .form-group -->
                        <div class="form-group">
                            <label>Occupation</label>
                            <input type="text" name="occupation" value="<?=$user['occupation']?>" placeholder="***">
                            <hr>
                        </div><!-- .form-group -->
                        <div class="form-group">
                            <label>Location</label>
                            <input type="text" name="location" value="<?=$user['location']?>" placeholder="***">
                            <hr>
                        </div><!-- .form-group -->
                    </div>
                </div><!-- .col-md-6 -->
                <div class="col-md-6 profile-right-pane">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="profile-pic-area ml-auto">
                                <img id="img-preview" class="img-fluid" src="/assets/files/<?=!empty(trim($user['profile_pic'])) ? $user['profile_pic'] : 'profile-photo-generic.jpg' ?>" alt="Profile Pic">
                            </div><!-- .profile-pic -->
                        </div><!-- .col-sm-6 -->
                        <div class="col-sm-6">
                            <div class="form-group">
                                <input type="file" name="profilePic" onchange="previewFile()" id="file-with-preview" class="upload-photo-btn inputfile mr-auto">
                                <label for="file-with-preview">SELECT PHOTO</label>
                            </div><!-- .form-group -->
                        </div><!-- .col-sm-6 -->
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="text" name="email" value="<?=$user['email']?>">
                        <hr>
                    </div><!-- .form-group -->
                    <div class="form-group">
                        <label>Password</label>
                        <input id="password" type="text" name="password" value="" placeholder="********">
                        <hr class="verification-signal">
                    </div><!-- .form-group -->
                    <div class="form-group">
                        <label>Verify Password</label>
                        <input id="password-verification" type="text" value="" placeholder="********">
                        <hr class="verification-signal">
                    </div><!-- .form-group -->
                </div><!-- .col-md-6 -->
            </div><!-- .row -->
            <div class="row">
                <div class="col-md-12">
                    <input class="form-edit-btn mx-auto" type="submit" value="SUBMIT CHANGES">
                </div><!-- .col-md-12 -->
            </div><!-- .row -->
        </form>
    </div><!-- .container -->
</div><!-- #edit-profile-section -->

<?php
}
?>

<?php require_once '../../elements/footer.php';
