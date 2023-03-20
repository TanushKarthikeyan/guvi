<?php
require_once('./db.php');
if($_POST) {
    $result = $connectDb->query("INSERT INTO `login`(`email`, `password`, `name`) VALUES ('".$_POST['email']."','".$_POST['password']."','".$_POST['name']."')");
    if($result === TRUE) {
        $res = array('status'=>'success','statuscode'=> 200);
        echo json_encode($res);
    } else {
        $res = array('status'=>'failed','statuscode'=> 400);
        echo json_encode($res);
    }
} else {
    echo 'Method not allowed';
}
?>