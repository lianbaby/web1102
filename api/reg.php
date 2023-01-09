<?php
include_once "base.php";

unset($_POST['pw2']); //先把不需要的值去掉
$User->save($_POST); //其他全部儲存起來
?>