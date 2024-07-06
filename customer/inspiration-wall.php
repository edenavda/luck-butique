<?php
include 'auth.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="stylesheet" href="../assets/css/main.css?<?php echo time(); ?>">
    <style>
        .rounded-circle-btn {
            border-radius: 50%;
            width: 50px;
            height: 50px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .rounded-circle-btn::after {
            display: none !important;
        }
        
        .dropdown{
            display: flex;
            justify-content: center;
        }
        
        .inspiration-wall img{
            margin-left: 15px;
        }

    </style>
</head>

<body>
    <?php include 'nav.php'; ?>
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-12">
                <h1 class="heading">Welcome, <?php echo $customerdata['firstname']; ?></h1>
                <hr>
                <div class="mt-5 mb-5">
                    <div class="mb-5 text-center">
                        <h2 class="mb-3">My Inspiration Wall</h2>
                        <div class="dropdown">
                            <button class="btn btn-primary dropdown-toggle rounded-circle-btn" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-plus"></i>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="#">Gallery</a>
                                <a class="dropdown-item" href="#">Pixabay</a>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-5">
                        <div class="col-md-12 inspiration-wall text-center">
                            <img src="../assets/images/inpiration/u18.svg" alt="">
                            <img src="../assets/images/inpiration/u19.svg" alt="">
                            <img src="../assets/images/inpiration/u20.svg" alt="">
                            <img src="../assets/images/inpiration/u21.svg" alt="">
                            <img src="../assets/images/inpiration/u22.svg" alt="">
                            <img src="../assets/images/inpiration/u23.svg" alt="">
                        </div>
                    </div>
                    <div class="row text-center">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <a href="request-design.php" class="btn btn-outline-primary">Request for special design</a> 
                            </div>
                            <div>
                                <a href="choose-nail-polish.php" class="btn btn-outline-primary">Choose nail polish for next turn</a>
                            </div>
                        </div>
                    </div>
                    

                </div>
            </div>
        </div>
    </div>



    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>
