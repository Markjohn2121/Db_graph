<?php
session_start();
if(isset($_POST['id'])){
include '../database/db.php';
$role  =$_POST['role'];
$id  =$_POST['id'];
$from  =$_POST['from'];
$sid = $_SESSION['id'];
if($from == 'driver'){
    $sql = "SELECT u.*, c.*
    FROM users u
    INNER JOIN customer c ON u.id = c.customer_id
    WHERE c.driver_id = $sid";

}else if($from == 'customer'){
   
    $sql = "SELECT u.*, c.*
    FROM users u
    INNER JOIN customer c ON u.id = c.customer_id
    WHERE c.driver_id = $sid   AND c.id = $id";
}else if($_POST['delete'] == 'delete'){
    $sql = "SELECT * FROM customer WHERE id = $id";  

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