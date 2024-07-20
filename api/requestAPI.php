<?php
session_start();

if(isset($_POST['update_id'])){
    include "../database/db.php";
$id = $_POST['update_id'];

$action = $_POST['action'];
$sid = $_SESSION['id'];


if($action == 'accept'){

    $signup_query_res = mysqli_query($conn,"UPDATE customer SET status='$action' WHERE id= '$id'");
}else if($action == 'denied'){
    $signup_query_res = mysqli_query($conn,"UPDATE customer SET driver_id= null,status='$action' WHERE id= '$id'");
}else if($action == 'finish'){
    $signup_query_res = mysqli_query($conn,"UPDATE customer SET driver_id= null,status='' WHERE id= '$id'");
}else if($action == 'request'){
    $from = $_POST['request_FROM'];
    $to = $_POST['request_TO'];


    $signup_query_res = mysqli_query($conn,"INSERT INTO customer (id, driver_id, customer_id, status, from_location, to_location)
    VALUES ($sid, $id, $sid, 'pending', '$from', ' $to')
    ON DUPLICATE KEY UPDATE 
        driver_id = VALUES(driver_id),
        customer_id = VALUES(customer_id),
        status = VALUES(status),
        from_location = VALUES(from_location),
        to_location = VALUES(to_location);
    ");
}



if($signup_query_res){
    echo json_encode([array('msg'=>'request denied successfully','state'=>true)]);
    // $_SESSION['username'] = $_POST['signup_username'];
}else{
    echo json_encode([array('msg'=>'something went wrong','state'=>false)]);
}
  



}else{

    echo json_encode([array('msg'=>'something went wrong','state'=>false)]);
}







