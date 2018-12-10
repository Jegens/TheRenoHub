<?php  require_once("../../core/includes.php");

$p = new Reno;
$p->delete();
header("Location: /projects/index.php?action=view-my-renos");
exit();
