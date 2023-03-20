<?php
require_once('./db.php');
if($_POST) {
    $result = $connectDb->query("select * from login where email='" .$_POST['email']."' and password='".$_POST['password']."'");
    if($result && mysqli_num_rows($result) > 0) {
        $row = $result->fetch_assoc();
        $res = array('status'=>'success','statuscode'=> 200, 'id'=>  $row['id']);
        echo json_encode($res);
    } else {
        $res = array('status'=>'failed','statuscode'=> 400);
        echo json_encode($res);
    }
} else {
    echo 'Method not allowed';
}


?>