<?php
include_once 'base.php';

echo $user=$User->count(['pw'=>$_POST['pw']]);
?>