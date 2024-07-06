<?php
ob_start();
$status = session_status();

if($status == PHP_SESSION_NONE){
    session_start();
}

else if($status == PHP_SESSION_DISABLED){
    //Sessions are not available
}else if($status == PHP_SESSION_ACTIVE){
    //Destroy current and start new one
    session_destroy();
    session_start();
}

if(!isset($_SESSION['customer'])){
    header('Location: ../connect.php');
    exit();
}else{
    include '../db.php';
    $customerid = $_SESSION['customer'];
    $query = "select * from users where id = ?";
    $stmt = $sql->prepare($query);
    $stmt->bindParam(1, $customerid, PDO::PARAM_INT);
    $stmt->execute();
    $customerdata = $stmt->fetch();
}
?>