<?php
ob_start();
session_start();
require_once 'db.php';
if(isset($_POST['submit'])){
    $_email = $_POST['email'];
    $_password = $_POST['password'];
    $stmt = $sql->prepare("select * from users where email = ?");
    $stmt->bindParam(1, $_email, PDO::PARAM_STR);
    $stmt->execute();
    $row = $stmt->fetch();
    $total = $stmt->rowCount();
    if($total>0){
        $db_email = $row['email'];
        $db_password = $row['password'];
        if($_email == $db_email && password_verify($_password, $db_password)){
            if($row['type']=='customer'){
                $_SESSION['customer'] = $row['id'];
                ob_start();
                header('location:customer/');
            }elseif($row['type']=='manicurist'){
                $_SESSION['manicurist'] = $row['id'];
                ob_start();
                header('location:manicurist/');
            }else{
                $_SESSION['admin'] = $row['id'];
                ob_start();
                header('location:admin/');
            }
            exit();
        }else {
            $msg = "<div class='alert alert-danger'>Email or password is incorrect!</div>";
        }
    }else {
        $msg = "<div class='alert alert-danger'>Email or password is incorrect!</div>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/main.css?<?php echo time(); ?>">
</head>

<body>

    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-6">
                <h1 class="heading">Login</h1>
                <div class="mt-5 ">
                    <?php if(isset($msg)){ echo $msg; } ?>
                    <form action="" method="post">
                        <div class="mb-3">
                            <label for="">Email</label>
                            <input type="text" class="form-control" name="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="">Password</label>
                            <input type="password" class="form-control" name="password" required>
                        </div>
                        <div class="mb-3">
                            
                            <button name="submit" class="btn mb-3 w-100 btn-primary">Submit</button>
                            <p class="text-center">Don't have an account? <a href="register.php">Register</a></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>



    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>
