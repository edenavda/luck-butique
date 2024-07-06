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

if(!isset($_SESSION['manicurist'])){
    header('Location: ../connect.php');
    exit();
}else{
    include '../db.php';
    $manicuristid = $_SESSION['manicurist'];
    $query = "select * from users where id = ?";
    $stmt = $sql->prepare($query);
    $stmt->bindParam(1, $manicuristid, PDO::PARAM_INT);
    $stmt->execute();
    $manicuristdata = $stmt->fetch();
}
?>