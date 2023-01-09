<?php
include_once 'base.php';

echo $user=$User->count(['acc'=>$_POST['acc']]);
//下述為正統寫法，上述是快速寫法，但有一個問題，如果同時有兩個一樣名字的帳號，會有問題
// if($user>0){
//     echo 1;
// }else{
//     echo 0;
// }

?>