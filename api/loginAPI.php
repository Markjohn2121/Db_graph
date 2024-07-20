<?php
session_start();

if(isset($_POST['login_username'])){
    include "../database/db.php";

$username = $_POST['login_username'];

$password = $_POST['login_password'];

$get_all_user_query ="SELECT * FROM users WHERE username = '$username' AND password = '$password'";
 $result = $conn->query($get_all_user_query);

if($result->num_rows == 1){

  

    if($row = $result->fetch_assoc()) {
        $_SESSION['username'] =$row['username'];
        $_SESSION['id'] = $row['id'];
        $_SESSION['role'] = $row['role'];
        echo json_encode([array('msg'=>'login successfully','state'=>true,'role'=>$row['role'])]);
    }



}else{
    
    echo json_encode([array('msg'=>'incorrect username or password','state'=>false)]);



  
}


}







