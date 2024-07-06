<?php
function connect() {
    $username = 'isedenav_luck';
    $password = 'jZ,1%Bxds7d?';
    $mysqlhost = 'localhost';
    $dbname = 'isedenav_luck';
    $pdo = new PDO('mysql:host='.$mysqlhost.';dbname='.$dbname.';charset=utf8', $username, $password);
    if($pdo){
        //make errors throw exceptions
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    }else{
        die("Could not create PDO connection.");
    }
}

$sql = connect();
$app_name = 'Luck Boutique';


?>