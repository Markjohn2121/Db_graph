<?php
session_start();
if(isset($_POST['role'])){
include '../database/db.php';
$role  =$_POST['role'];
if($role =='all'){
    $sql = "SELECT * FROM users WHERE role ='Driver' ORDER BY created DESC";
}else if($role =='Driver'){
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



}else if(isset($_POST['reqID'])){
    include '../database/db.php';
    $sid = $_SESSION['id'];
    $sql = "SELECT u.*, c.*
    FROM users u
    INNER JOIN customer c ON u.id = c.customer_id
    WHERE  c.customer_id = $sid";




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
 
}