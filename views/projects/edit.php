<?php  require_once("../../core/includes.php");

if( !empty($_GET) ){ //check url has id in it}

    $p = new Reno;
    $reno = $p->get_by_id($_GET['id']);

    if( !empty($_POST) ){//check if form was submitted

        $p->edit($_GET['id']);
        header("Location: projects/post.php?action=edit-post");
        exit();
    }else{
    header("Location: projects/index.php?action=view-all");
    exit();
    }
}

    // unique html head vars
    $title = 'Edit Project';
    require_once("../../elements/html_head.php");
    require_once("../../elements/nav.php");
