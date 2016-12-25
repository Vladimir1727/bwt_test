<?php
$data=Feed::allfeeds();
$_SESSION['table']=$data;
include_once('v/v_allfeeds.php');