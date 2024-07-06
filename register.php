<?php
session_start();
include 'db.php';
if(isset($_POST['submit'])){
    $options = [ 'cost' => 11];
    $type = (isset($_POST['type']) && !empty($_POST['type'])) ? $_POST['type'] : 'customer';
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT, $options);
    if(!empty($_POST['email'])){
        $stmt = $sql->prepare("select email from users where email = ?");
        $stmt->bindParam(1, $_POST['email'], PDO::PARAM_STR);
        $stmt->execute();
        if ($stmt->rowCount() > 0){
            $msg = "<div class='alert w-100 alert-danger'>This email address is already in use!</div>";
        }else{
            
            if (!preg_match("/^[a-zA-Z]+$/", $_POST['firstname'])) {
                $msg = "<div class='alert w-100 alert-danger'>First name must only contains letters.</div>";
            }elseif (!preg_match("/^[a-zA-Z]+$/", $_POST['lastname'])) {
                $msg = "<div class='alert w-100 alert-danger'>Last name must only contains letters.</div>";
            }elseif (!preg_match("/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/", $_POST['password'])) {
                $msg = "<div class='alert w-100 alert-danger'>Password must contain at least 8 characters, including both letters and numbers.</div>";
            }else{
                $stmt = $sql->prepare("INSERT INTO users (firstname, lastname, email, phone, password, type) 
                VALUES (?, ?, ?, ?, ?, ?)");
                $stmt->bindParam(1, $_POST['firstname'], PDO::PARAM_STR);
                $stmt->bindParam(2, $_POST['lastname'], PDO::PARAM_STR);
                $stmt->bindParam(3, $_POST['email'], PDO::PARAM_STR);
                $stmt->bindParam(4, $_POST['phone'], PDO::PARAM_STR);
                $stmt->bindParam(5, $password, PDO::PARAM_STR);
                $stmt->bindParam(6, $type, PDO::PARAM_STR);
                if($stmt->execute()){
                    $id = $sql->lastInsertId();
                    if($type=='customer'){
                        $_SESSION['customer'] = $id;
                        $_SESSION['message'] = "<div class='alert alert-success'>Account created successfully. Thank you.</div>";
                        header('location:customer/');
                        die();
                    }elseif($type=='manicurist'){
                        $_SESSION['type'] = 'manicurist';
                        $_SESSION['message'] = "<div class='alert alert-success'>Account created successfully. Thank you.</div>";
                        header('location:manicurist/');
                        die();
                    }elseif($type=='business'){
                        $_SESSION['type'] = 'business';
                        $_SESSION['message'] = "<div class='alert alert-success'>Account created successfully. Thank you.</div>";
                        header('location:business/');
                        die();
                    }
                }
            }
        }
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
                <h1 class="heading">Register</h1>
                <div class="mt-5 mb-5">
                    <?php if(isset($msg)){ echo $msg; } ?>
                    <form action="" method="post">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="">First Name*</label>
                                    <input type="text" class="form-control" name="firstname" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="">Last Name*</label>
                                    <input type="text" class="form-control" name="lastname" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="">Phone Number*</label>
                                    <input type="text" class="form-control" name="phone" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="">Email*</label>
                                    <input type="email" class="form-control" name="email" required>
                                </div>
                            </div>
                        </div>
                        
                        <div class="mb-3">
                            <label for="">Password</label>
                            <input type="password" class="form-control" name="password" required>
                        </div>
                        <div class="mb-3">
                            <label for="">Login as</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="type" id="exampleRadios1" value="customer" checked>
                                <label class="form-check-label" for="exampleRadios1">
                                    Customer
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="type" id="exampleRadios2" value="manicurist">
                                <label class="form-check-label" for="exampleRadios2">
                                    Manicurist
                                </label>
                            </div>
                        </div>
                        <div class="mb-3">
                            <button name="submit" class="btn mb-3 w-100 btn-primary">Submit</button>
                            <p class="text-center">Already have an account? <a href="connect.php">Login</a></p>
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
