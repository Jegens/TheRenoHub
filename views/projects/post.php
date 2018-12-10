<?php  require_once '../../core/includes.php';


    $u = new User;
    $user = $u->get_by_id($_SESSION['user_logged_in']); // Show profile info

    $p = new Reno;
    $reno = $p->get_by_id($_GET['id']); // Show post info

    if( !empty($_POST) ){
        $p->edit($_GET['id']);
        $reno_id=(int)$_GET['id'];
        header("Location: /projects/post.php?action=edit-post&id=$reno_id");
        exit();
    }

    // unique html head vars
    $title = 'Reno Post Page';
    require_once '../../elements/html_head.php';
?>

<?php
if( $_GET['action']=='create-post' ){ ?>
<!-- ******** CREATE RENO SECTION ******** -->

<div id="create-reno-section" class="profile-container mx-auto">
    <div class="row">
        <div class="col-sm-12 backdrop">
        </div><!-- .col-sm-12 backdrop -->
    </div><!-- .row -->
    <div class="container reno-post-wrap">
        <div id="back-to-home">
            <a href="/"><i class="fas fa-home"></i></a>
        </div>
        <div class="row">
            <div class="col-md-12 profile-wrap">
                <h1 class="text-center">CREATE POST</h1>
            </div><!-- .col-md-12 -->
        </div><!-- .row -->
        <form action="/projects/add.php" method="post" enctype="multipart/form-data">
            <div class="row">
                <div id="post-uploads" class="col-md-6">
                    <div class="before-photo-container mx-auto">

                        <img id="img-preview-before" class="before-photo-area" src="/assets/files/<?=!empty(trim($reno['before_photo'])) ? $reno['before_photo'] : 'before-after-placeholder.jpeg'?>" alt="Before Photo">

                        <div class="form-group">
                            <input type="file" name="beforeUpload" onchange="previewFileBefore()" id="file-with-preview-before" class="before-upload inputfile">
                            <label for="file-with-preview-before">SELECT PHOTO</label>
                        </div><!-- .form-group -->
                        <div class="upload-category">
                            <p>BEFORE</p>
                        </div><!-- .upload-category -->
                    </div><!-- .before-photo-container -->

                    <div class="after-photo-container mx-auto">

                        <img id="img-preview-after" class="after-photo-area" src="/assets/files/<?=!empty(trim($reno['after_photo'])) ? $reno['after_photo'] : 'before-after-placeholder.jpeg'?>" alt="After Photo">

                        <div class="form-group">
                            <input type="file" name="afterUpload" onchange="previewFileAfter()" id="file-with-preview-after" class="after-upload inputfile">
                            <label for="file-with-preview-after">SELECT PHOTO</label>
                        </div><!-- .form-group -->
                        <div class="upload-category">
                            <p>AFTER</p>
                        </div><!-- .upload-category -->
                    </div><!-- .before-photo-container -->
                </div><!-- .col-md-6 -->
                <div class="col-md-6 post-info">
                    <div class="form-group">
                        <label>TITLE</label>
                        <input type="text" name="title" value="" placeholder="Add Reno Title..." required>
                        <hr>
                    </div><!-- .form-group -->
                    <div class="form-group">
                        <label>RENO CATEGORY</label>
                        <select class="form-control" name="category" required>
                            <option value="" disabled selected>Select Category...</option>
                            <option>Kitchen</option>
                            <option>Bathroom</option>
                            <option>Bedroom</option>
                            <option>Dining Room</option>
                            <option>Living Room</option>
                        </select>
                        <hr>
                    </div><!-- .form-group -->
                    <div class="form-group">
                        <label>RENO DESCRIPTION</label>
                        <textarea class="create-description" name="description" rows="6" cols="80" placeholder="Add Description..." required></textarea>
                    </div><!-- .form-group -->

                </div><!-- .col-md-6 -->
            </div><!-- .row -->
            <div class="row">
                <div class="col-md-12">
                    <input class="form-edit-btn mx-auto" type="submit" value="SUBMIT">
                </div><!-- .col-md-12 -->
            </div><!-- .row -->
        </form>
    </div><!-- .container -->
</div><!-- #create-reno-section -->

<?php
}
?>



<?php
if( $_GET['action']=='edit-post' ){ ?>
<!-- ******** EDIT RENO SECTION ******** -->

<div id="create-reno-section" class="profile-container mx-auto">
    <div class="row">
        <div class="col-sm-12 backdrop">
        </div><!-- .col-sm-12 backdrop -->
    </div><!-- .row -->
    <div class="container reno-post-wrap">
        <div id="back-to-home">
            <a href="/"><i class="fas fa-home"></i></a>
        </div>
        <div id="back-to-view">
            <a href="/projects/index.php?action=view-my-renos"><i class="fas fa-undo-alt"></i></a>
        </div>
        <div class="row">
            <div class="col-md-12 profile-wrap">
                <h1 class="text-center">EDIT POST</h1>
            </div><!-- .col-md-12 -->
        </div><!-- .row -->
        <form method="post" enctype="multipart/form-data">
            <div class="row">
                <div id="post-uploads" class="col-md-6">
                    <div class="before-photo-container mx-auto">

                        <img id="img-preview-before" class="before-photo-area" src="/assets/files/<?=!empty(trim($reno['before_photo'])) ? $reno['before_photo'] : 'before-after-placeholder.jpeg'?>" alt="Before Photo">

                        <div class="form-group">
                            <input type="file" name="beforeUpload" onchange="previewFileBefore()" id="file-with-preview-before" class="before-upload inputfile">
                            <label for="file-with-preview-before">SELECT PHOTO</label>
                        </div><!-- .form-group -->
                        <div class="upload-category">
                            <p>BEFORE</p>
                        </div><!-- .upload-category -->
                    </div><!-- .before-photo-container -->

                    <div class="after-photo-container mx-auto">

                        <img id="img-preview-after" class="after-photo-area" src="/assets/files/<?=!empty(trim($reno['after_photo'])) ? $reno['after_photo'] : 'before-after-placeholder.jpeg'?>" alt="After Photo">

                        <div class="form-group">
                            <input type="file" name="afterUpload" onchange="previewFileAfter()" id="file-with-preview-after" class="after-upload inputfile">
                            <label for="file-with-preview-after">SELECT PHOTO</label>
                        </div><!-- .form-group -->
                        <div class="upload-category">
                            <p>AFTER</p>
                        </div><!-- .upload-category -->
                    </div><!-- .before-photo-container -->
                </div><!-- .col-md-6 -->
                <div class="col-md-6 post-info">
                    <div class="form-group">
                        <label>TITLE</label>
                        <input type="text" name="title" value="<?=$reno['title']?>" placeholder="Add Reno Title..." required>
                        <hr>
                    </div><!-- .form-group -->
                    <div class="form-group">
                        <label>RENO CATEGORY</label>
                        <select class="form-control" name="category" required>
                            <?php

                                $categories = array('Kitchen',
                                'Bathroom',
                                'Bedroom',
                                'Dining Room',
                                'Living Room'
                                );

                                $selected = '';


                                foreach ($categories as $category) {
                                    if ($reno['category'] == $category) {
                                        $selected = 'selected';
                                    }else{
                                        $selected = '';
                                    }
                                    echo '<option ' .$selected. '>' . $category . '</option>';
                                }

                            ?>
                        </select>
                        <hr>
                    </div><!-- .form-group -->
                    <div class="form-group">
                        <label>RENO DESCRIPTION</label>
                        <textarea class="create-description" name="description" rows="6" cols="80" placeholder="Add Description..." required><?=$reno['description']?></textarea>
                    </div><!-- .form-group -->

                </div><!-- .col-md-6 -->
            </div><!-- .row -->
            <div class="row">
                <div class="col-md-12">
                    <input class="form-edit-btn mx-auto" type="submit" value="SUBMIT">
                </div><!-- .col-md-12 -->
            </div><!-- .row -->
        </form>
    </div><!-- .container -->
</div><!-- #create-reno-section -->

<?php
}
?>

<?php
if( $_GET['action']=='view-post' ){ ?>
<!-- ******** VIEW RENO SECTION ******** -->

<div id="view-reno-section" class="profile-container mx-auto">
    <div class="row">
        <div class="col-sm-12 backdrop">
        </div><!-- .col-sm-12 backdrop -->
    </div><!-- .row -->
    <div class="container reno-post-wrap">
        <div id="back-to-home">
            <a href="/"><i class="fas fa-home"></i></a>
        </div>
        <div class="row">
            <div class="col-md-12 profile-wrap">
                <h1 class="text-center"><?=$reno['title']?></h1>
            </div><!-- .col-md-12 -->
        </div><!-- .row -->
        <div class="row">
            <div id="post-uploads" class="col-md-6">
                <div class="before-photo-container mx-auto">
                    <img id="img-preview-before" class="before-photo-area" src="/assets/files/<?=!empty(trim($reno['before_photo'])) ? $reno['before_photo'] : 'before-after-placeholder.jpeg'?>" alt="Before Photo">
                    <div class="upload-category">
                        <p>BEFORE</p>
                    </div><!-- .upload-category -->
                </div><!-- .before-photo-container -->
                <div class="after-photo-container mx-auto">
                    <img id="img-preview-after" class="after-photo-area" src="/assets/files/<?=!empty(trim($reno['after_photo'])) ? $reno['after_photo'] : 'before-after-placeholder.jpeg'?>" alt="After Photo">
                    <div class="upload-category">
                        <p>AFTER</p>
                    </div><!-- .upload-category -->
                </div><!-- .before-photo-container -->
            </div><!-- .col-md-6 -->
            <div class="col-md-6 post-info">
                <div class="form-group">
                    <h4><?=$reno['category'] . ' '?>RENO</h4>
                    <hr>
                </div><!-- .form-group -->
                <div class="form-group des-area-lg">
                    <p><?=$reno['description']?></p>

                </div><!-- .form-group -->
            </div><!-- .col-md-6 -->
        </div><!-- .row -->
        <div class="row">
            <div class="col-sm-12">
                <a class="btr-button-view" href="/projects/index.php?action=view-all">BACK TO RENOS</a>
            </div><!-- .col-sm-12 -->
        </div><!-- .row -->
    </div><!-- .container -->
</div><!-- #create-reno-section -->

<?php
}
?>

<?php require_once '../../elements/footer.php';
