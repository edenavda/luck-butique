<?php
include 'auth.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Choose nail polish for next turn</title>
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

        .dropdown {
            display: flex;
            justify-content: center;
        }

        .inspiration-wall img {
            margin-left: 15px;
            cursor: pointer;
        }

        .inspiration-wall .nail-polish {
            display: flex;
            justify-content: center;
        }
        
        .nail-polish{
            font-size: 13px;
            margin-bottom: 15px;
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
                        <h2 class="mb-3">My Next Color Is</h2>

                    </div>
                    <div class="row mb-5">
                        <div class="col-md-12 inspiration-wall text-center">
                            <div class="nail-polish">
                                <div class="mr-5">
                                    <img src="../assets/images/nail_colors/u11.svg" alt=""><br>
                                    Light Blue #1
                                </div>
                                <div class="mr-5">
                                    <img src="../assets/images/nail_colors/u13.svg" alt=""><br>
                                    Light Blue #2
                                </div>
                                <div class="mr-5">
                                    <img src="../assets/images/nail_colors/u15.svg" alt=""><br>
                                    Light Blue #3
                                </div>
                                <div>
                                    <img src="../assets/images/nail_colors/u17.svg" alt=""><br>
                                    Light Blue #4
                                </div>
                            </div>





                        </div>
                        <div class="col-md-12 inspiration-wall text-center">
                            <div class="nail-polish">
                                <div class="mr-5">
                                    <img src="../assets/images/nail_colors/u19.svg" alt=""><br>
                                    Purple #1
                                </div>
                                <div class="mr-5">
                                    <img src="../assets/images/nail_colors/u21.svg" alt=""><br>
                                    Purple #2
                                </div>
                                <div class="mr-5">
                                    <img src="../assets/images/nail_colors/u23.svg" alt=""><br>
                                    Purple #3
                                </div>
                                <div>
                                    <img src="../assets/images/nail_colors/u25.svg" alt=""><br>
                                    Purple #4
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12 inspiration-wall text-center">
                            <div class="nail-polish">
                                <div class="mr-5">
                                    <img src="../assets/images/nail_colors/u27.svg" alt=""><br>
                                    Orange #1
                                </div>
                                <div class="mr-5">
                                    <img src="../assets/images/nail_colors/u29.svg" alt=""><br>
                                    Orange #2
                                </div>
                                <div class="mr-5">
                                    <img src="../assets/images/nail_colors/u31.svg" alt=""><br>
                                    Orange #3
                                </div>
                                <div >
                                    <img src="../assets/images/nail_colors/u33.svg" alt=""><br>
                                    Orange #4
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12 inspiration-wall text-center">
                            <div class="nail-polish">
                                <div class="mr-5">
                                    <img src="../assets/images/nail_colors/u35.svg" alt=""><br>
                                    Green #1
                                </div>
                                <div class="mr-5">
                                    <img src="../assets/images/nail_colors/u37.svg" alt=""><br>
                                    Green #2
                                </div>
                                <div class="mr-5">
                                    <img src="../assets/images/nail_colors/u39.svg" alt=""><br>
                                    Green #3
                                </div>
                                <div >
                                    <img src="../assets/images/nail_colors/u41.svg" alt=""><br>
                                    Green #4
                                </div>
                            </div>





                        </div>
                        <div class="col-md-12 inspiration-wall text-center">
                            <div class="nail-polish text-center">
                                <div class="mr-5">
                                    <img src="../assets/images/nail_colors/u43.svg" alt=""><br>
                                    Yellow #1
                                </div>
                                <div class="mr-5">
                                    <img src="../assets/images/nail_colors/u45.svg" alt=""><br>
                                    Yellow #2
                                </div>
                                <div class="mr-5">
                                    <img src="../assets/images/nail_colors/u47.svg" alt=""><br>
                                    Yellow #3
                                </div>
                                <div>
                                    <img src="../assets/images/nail_colors/u49.svg" alt=""><br>
                                    Yellow #4
                                </div>
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
    
    <script>
        $(".inspiration-wall img").click(function(){
            alert('Thanks. Your color is selected. See you in next appointment.');
            window.location = 'inspiration-wall.php';
        })
    
    </script>
    
    
</body>

</html>
