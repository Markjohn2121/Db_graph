<?php
session_start();

if(isset($_POST['viewEdit_id'])){
    include "../database/db.php";
$id = $_POST['viewEdit_id'];
$username = $_POST['viewEdit_username'];
$name = $_POST['viewEdit_name'];
$email = $_POST['viewEdit_email'];
$password = $_POST['viewEdit_password'];
$role = $_POST['viewEdit_Role'];
$sex = $_POST['viewEdit_sex'];
$get_all_user_query ="SELECT * FROM users WHERE username != '$username' AND username = '$username'" ;
 $User_result = $conn->query($get_all_user_query);

if($User_result->num_rows >= 1){

    echo json_encode([array('msg'=>'username already used!','state'=>false)]);

}else{
    



$signup_query_res = mysqli_query($conn,"UPDATE users SET username='$username',password='$password',email='$email',name='$name',role='$role',sex='$sex' WHERE id='$id'");
if($signup_query_res){
    echo json_encode([array('msg'=>'Update successfully','state'=>true)]);
    // $_SESSION['username'] = $_POST['signup_username'];
}else{
    echo json_encode([array('msg'=>'something went wrong','state'=>false)]);
}
  
}


}else{

    echo json_encode([array('msg'=>'something went wrong','state'=>false)]);
}







