<?php
session_start();

if(isset($_POST['id'])){
    include "../database/db.php";

$id = $_POST['id'];
$Currentusername = $_POST['username'];

$new_username = $_POST['editACCOUNT_newusername'];
$name = $_POST['editACCOUNT_name'];
$email = $_POST['editACCOUNT_email'];
$password = $_POST['editACCOUNT_password'];

$sex = $_POST['editACCOUNT_sex'];
$get_all_user_query ="SELECT * FROM users WHERE username IN ('$Currentusername', '$new_username');" ;
 $User_result = $conn->query($get_all_user_query);

if($User_result->num_rows > 1){

    echo json_encode([array('msg'=>'username already used!','state'=>false)]);

}else{
    



$signup_query_res = mysqli_query($conn,"UPDATE users SET username='$new_username',password='$password',email='$email',name='$name',sex='$sex' WHERE id='$id'");
if($signup_query_res){
    echo json_encode([array('msg'=>'Update successfully','state'=>true)]);
    // $_SESSION['username'] = $_POST['signup_username'];
    $_SESSION['username'] = $new_username;
}else{
    echo json_encode([array('msg'=>'something went wrong','state'=>false)]);
}
  
}


}else{

    echo json_encode([array('msg'=>'something went wrong','state'=>false)]);
}







