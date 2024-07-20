<?php

if(isset($_POST['role'])){
include '../database/db.php';
$role  =$_POST['role'];
if($role =='all'){
    $sql = "SELECT * FROM users ORDER BY created DESC";
}else if(isset($_POST['prev_id'])){
    $prevID = $_POST['prev_id'];
    $sql = "SELECT * FROM users WHERE id = '$prevID'";
}else{
    $sql = "SELECT * FROM users WHERE role = '$role' ORDER BY created DESC";
}
// echo json_encode(array('ss'=>$role ));

$result = $conn->query($sql);

if ($result->num_rows > 0) {

    // echo json_encode($result->fetch_assoc());
$rows = [];
    while($row = $result->fetch_assoc()){
        $rows[] = $row;
    }
    echo json_encode($rows);
}



}else{
    echo json_encode(array('sees'=>'sds'));
    echo json_encode(array('ss'=>$role ));  
}