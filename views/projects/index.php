<?php  require_once '../../core/includes.php';
    // unique html head vars
    $title = 'Renos Page';
    require_once '../../elements/html_head.php';

?>

<header id="renos-home">
    <?php
    require_once("../../elements/nav.php");
    ?>

    <div id="overlay">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 mx-auto">
                    <div id="reno-banner-message" class="mx-auto">
                        <h2>TAKE THE RENO CHALLENGE TODAY!</h2>
                        <h3>Pick a room and start planning.</h3>
                        <h4>Find your inspiration now and get reno'ing.</h4>
                    </div><!-- #banner-message -->
                    <a href="/projects/post.php?action=create-post" class="banner-btn mx-auto">POST RENO</a>
                </div><!-- .col-lg-9 -->
            </div><!-- .row -->
        </div><!-- .container -->
    </div><!-- #overlay -->
</header>

<!-- ******** VIEW ALL POSTS SECTION ******** -->

<div id="reno-post-section" style="
<?php
    if($_GET['action']=='view-all' || $_GET['action']=='view-my-renos' ) {
        echo 'display: block;';
    }else{
        echo 'display: none;';
    }
?>

">
    <div class="container">
        <div id="reno-post-titles" class="row large-view">
            <div class="col-sm-1">
                <p class="post-title text-center">Before</p>
            </div><!-- .col-sm-1 -->
            <div class="col-sm-1">
                <p class="post-title text-center">After</p>
            </div><!-- .col-sm-1 -->
            <div class="col-sm-4">
                <p class="post-title ml-3">Title</p>
            </div><!-- .col-sm-4 -->
            <div class="col-sm-2">
                <p class="post-title">Category</p>
            </div><!-- .col-sm-2 -->
            <div class="col-sm-2">
                <p class="post-title">Post Date</p>
            </div><!-- .col-sm-2 -->
            <div class="col-sm-2">
                <?php
                    if($_GET['action']=='view-all') {
                        echo '<p class="post-title">Posted By</p>';
                    }else if($_GET['action']=='view-my-renos') {
                        echo '' ;
                    }
                ?>
            </div><!-- .col-sm-2 -->
        </div><!-- .row -->

        <?php
        $p = new Reno;
        $renos = $p->get_all();

        foreach($renos as $reno){

        ?><!-- Beginning for each loop -->

        <div class="row reno-posts large-view">
            <div class="col-sm-1 before-thumb">
                <img class="mx-auto" src="/assets/files/<?=!empty(trim($reno['before_photo'])) ? $reno['before_photo'] : 'before-after-placeholder.jpeg'?>" alt="Before Thumbnail Image">
            </div><!-- .col-sm-1 -->
            <div class="col-sm-1 after-thumb">
                <img class="mx-auto" src="/assets/files/<?=!empty(trim($reno['after_photo'])) ? $reno['after_photo'] : 'before-after-placeholder.jpeg'?>" alt="After Thumbnail Image">
            </div><!-- .col-sm-1 -->
            <a class="col-sm-4" href="/projects/post.php?action=view-post&id=<?=$reno['id']?>">
                <p class="post-title ml-3"><?=$reno['title']?></p>
            </a>
            <a class="col-sm-2" href="/projects/post.php?action=view-post&id=<?=$reno['id']?>">
                <p class="post-title"><?=$reno['category']?></p>
            </a>
            <a class="col-sm-2" href="/projects/post.php?action=view-post&id=<?=$reno['id']?>">
                <p class="post-title"><?=date('M j. Y', $reno['posted_time'])?></p>
            </a>
            <div class="col-sm-2">
                <p class="post-title ml-4">
                <?php
                    if($_GET['action']=='view-all') {
                            echo '<a href="/users/profile.php?action=view-post-user&id='.$reno['user_id'].'">'. $reno['username'].'</a>';
                    }else if($_GET['action']=='view-my-renos') {
                        echo '<a href="/projects/post.php?action=edit-post&id='.$reno['id'].'"><i class="fas fa-pencil-alt edit-icon"></i></a><a href="/projects/delete.php?id='.$reno['id'].'"><i class="fas fa-eraser del-icon"></i></a>' ;
                    }
                ?>
            </div><!-- .col-sm-2 -->
            <hr class="reno-divider">
        </div><!-- .row -->

<!-- ******** VIEW ALL POSTS SECTION - WIDTH < 767px ******** -->

        <div class="row reno-posts small-view">
            <div class="col-sm-10 mx-auto">
                <div class="pic-thumb">
                    <img class="mb-2" src="/assets/files/<?=!empty(trim($reno['before_photo'])) ? $reno['before_photo'] : 'before-after-placeholder.jpeg'?>" alt="Before Thumbnail Image">
                    <img src="/assets/files/<?=!empty(trim($reno['after_photo'])) ? $reno['after_photo'] : 'before-after-placeholder.jpeg'?>" alt="After Thumbnail Image">
                </div><!-- .pic-thumb -->
                <div class="post-info-small">
                    <div class="top-sec">
                        <a href="/projects/post.php?action=view-post&id=<?=$reno['id']?>" class="post-title">
                            <p class="small-title">TITLE:</p>
                            <p><?=$reno['title']?></p>
                            <p class="small-title">CATEGORY:</p>
                            <p><?=$reno['category']?></p>
                            <p class="small-title">POST DATE:</p>
                            <p><?=date('M j. Y', $reno['posted_time'])?></p>
                        </a>
                    </div>
                    <div class="bot-sec">
                        <p class="post-title">
                        <?php
                            if($_GET['action']=='view-all') {
                                echo '<a href="/users/profile.php?action=view-post-user&id='.$reno['user_id'].'"><p class="small-title">POSTED BY:</p><p>'. $reno['username'].'</p></a>';
                            }else if($_GET['action']=='view-my-renos') {
                                echo '<a href="/projects/post.php?action=edit-post&id='.$reno['id'].'"><i class="fas fa-pencil-alt edit-icon"></i></a><a href="/projects/delete.php?id='.$reno['id'].'"><i class="fas fa-eraser del-icon"></i></a>' ;
                            }
                        ?>
                    </div>
                </div><!-- .post-info-small -->
            </div><!-- .col-sm-10 -->
            <hr class="reno-divider">
        </div><!-- .row -->

    <?php
    }
    ?>

    </div><!-- .container -->
</div><!-- #reno-section -->


<div id="foot">
    <p>Created by JegenDesigns</p>
</div><!-- #foot -->

<?php require_once '../../elements/footer.php';
