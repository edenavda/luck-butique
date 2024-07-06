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

if(!isset($_SESSION['admin'])){
    header('Location: ../connect.php');
    exit();
}else{
    include '../db.php';
    $adminid = $_SESSION['admin'];
    $query = "select * from users where id = ?";
    $stmt = $sql->prepare($query);
    $stmt->bindParam(1, $adminid, PDO::PARAM_INT);
    $stmt->execute();
    $admindata = $stmt->fetch();
}
?>