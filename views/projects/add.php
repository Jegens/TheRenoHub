<?php

require_once '../../core/includes.php';

if( !empty($_POST['title']) && !empty($_POST['description']) ){ // Form was submitted

    // Add new reno to db
    $p = new Reno;
    $p->add();

}

header("Location: /projects/index.php");
