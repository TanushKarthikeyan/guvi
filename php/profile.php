<?php

require_once('./db.php');
/*require_once('./mongoose.php');*/
if($_POST['type'] == 'update') {
    $resultRec = $connectDb->query("select * from `profile` where id='".$_POST['id']."'");
    if($resultRec && mysqli_num_rows($resultRec) == 0) {
        $result = $connectDb->query("INSERT INTO `profile`(`id`) VALUES ('".$_POST['id']."')");
    }
    $result = $connectDb->query("UPDATE `profile` SET `dob`='" .$_POST['dob']."',`contact`='" .$_POST['contact']."',`age`='" .$_POST['age']."' WHERE id='".$_POST['id']."'");
    if($result === TRUE) {
        $res = array('status'=>'success','statuscode'=> 200);
        echo json_encode($res);
    } else {
        $res = array('status'=>'failed','statuscode'=> 400);
        echo json_encode($res);
    }
    
} else if($_POST['type'] == 'get') {
    // $collection = $db -> profile;
    // $data  = $collection->find(array('_id' => $_POST['id']));
    // print_r($data);
    $result = $connectDb->query("SELECT login.name, login.email,profile.profile_id, profile.id,profile.contact, profile.dob,profile.age FROM `login` LEFT join profile on login.id=profile.id where login.id='" .$_POST['id']."'");
    if($result && mysqli_num_rows($result) > 0) {
        $row = $result->fetch_assoc();
        $res = array('status'=>'success','statuscode'=> 200, 'personDetails'=>  $row);
        echo json_encode($res);
    } else {
        $res = array('status'=>'failed','statuscode'=> 400);
        echo json_encode($res);
    } 
} else {
    echo 'Method not allowed';
}

/* mong0 

$collection = $db -> profile;
    if(!$collection->find(array('_id' => $_POST['id']))) {
        $data   = array("id" => $_POST['id'], "dob" => $_POST['dob'], "contact" => $_POST['contact'],"age" => $_POST['age']);
        $collection->insert($data);
    }
    $newdata = array('$set' => array("dob" => $_POST['dob'], "contact" => $_POST['contact'],"age" => $_POST['age']));
    $condition = array("id" => $_POST['id']);
    if($collection->update($condition, $newdata)) {
        $res = array('status'=>'success','statuscode'=> 200, 'personDetails'=>  $row);
        echo json_encode($res);
    } else {
        $res = array('status'=>'failed','statuscode'=> 400);
        echo json_encode($res);
    }*/
?>