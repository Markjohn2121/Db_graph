<?php
session_start();

if(isset($_POST['del_id'])){
    include "../database/db.php";
$id = $_POST['del_id'];




$signup_query_res = mysqli_query($conn,"DELETE FROM users WHERE id=$id");
if($signup_query_res){
    echo json_encode([array('msg'=>'Deleted successfully','state'=>true)]);
    // $_SESSION['username'] = $_POST['signup_username'];
}else{
    echo json_encode([array('msg'=>'something went wrong','state'=>false)]);
}
  



}else{

    echo json_encode([array('msg'=>'something went wrong','state'=>false)]);
}







