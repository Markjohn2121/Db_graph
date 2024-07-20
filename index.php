<?php
session_start();

if(isset($_GET['logout'])){
    session_destroy();
    unset($_SESSION['username']);
    header('location: homepage.php');
}else{
    include 'database/db.php';
    /* $_SESSION['id'] = 1; */
    if(isset($_SESSION['username'])){
        $username = $_SESSION['username'];
        $get_user_role_query = mysqli_query($conn,"SELECT * FROM users WHERE username='$username'");
        echo mysqli_num_rows($get_user_role_query);
        echo $username;
        if(mysqli_num_rows($get_user_role_query) ==1){
            $get_user_role = mysqli_fetch_array($get_user_role_query);
            if($get_user_role['role'] == 'admin'){
            
                header('location: dashboard/admin');
            }elseif($get_user_role['role']=='Driver'){
               
                header('location: dashboard/driver');
               
            }elseif($get_user_role['role']=='Customer'){
                header('location: dashboard/customer');
            }
    
           
        }else{
            echo "else";
        }
    }else{
        header('location: homepage.php');   
        
    }




}



?>