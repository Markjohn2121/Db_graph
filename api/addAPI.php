<?php
session_start();

if(isset($_POST['add_username'])){
    include "../database/db.php";

$username = $_POST['add_username'];
$name = $_POST['add_name'];
$email = $_POST['add_email'];
$password = $_POST['add_password'];
$role = $_POST['add_Role'];
$sex = $_POST['add_sex'];
$get_all_user_query ="SELECT * FROM users WHERE username = '$username'";
 $User_result = $conn->query($get_all_user_query);

if($User_result->num_rows >= 1){

    echo json_encode([array('msg'=>'username already used!','state'=>false)]);

}else{
    



$signup_query_res = mysqli_query($conn,"INSERT INTO users(username,password,email,name,role,sex) VALUES('$username','$password','$email','$name','$role','$sex')");
if($signup_query_res){
    echo json_encode([array('msg'=>'signup successfully','state'=>true)]);
    // $_SESSION['username'] = $_POST['signup_username'];
}else{
    echo json_encode([array('msg'=>'something went wrong','state'=>false)]);
}
  
}


}else{

    echo json_encode([array('msg'=>'something went wrong','state'=>false)]);
}







