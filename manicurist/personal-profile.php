<?php
include 'auth.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Manicurist</title>
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

        .nail-polish {
            font-size: 13px;
            margin-bottom: 15px;
        }

        .nav-item button {
            border: 0;
            margin-left: 10px;
        }

        .fa-regular.fa-heart {
            font-size: 20px;
            color: white;
        }
        
        .main-image{
            width:180px;
            height:180px;
        }

    </style>
</head>

<body>
    <?php include 'nav.php'; ?>
    <div class="container">

        <div class="row justify-content-center mt-2">
            <div class="col-md-8">

                <div class="mt-5 mb-5">
                    <div class="mb-5 text-center">
                        <h2 class="mb-3 heading"><b><?php echo $manicuristdata['firstname'].' '.$manicuristdata['lastname']; ?></b></h2>
                        <div class="mb-3"><img class="main-image" src="../assets/images/manicurists/<?php echo $manicuristdata['image']; ?>" alt=""></div>

                    </div>
                </div>

                <div class="text-center">
                    <ul class="nav nav-pills justify-content-center mb-3" id="pills-tab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="pills-home-tab" data-toggle="pill" data-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Photos</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pills-profile-tab" data-toggle="pill" data-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Certificates</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pills-contact-tab" data-toggle="pill" data-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact" aria-selected="false">Reviews</button>
                        </li>
                    </ul>
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                            <div class="card mt-5 mb-5">
                                <div class="card-header ">
                                    <div class="float-right">
                                        <button class="btn btn-primary">Upload a picture</button>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-3 mb-4">
                                            <div style="position:relative">
                                                <img width="100%" class="mr-3 " src="../assets/images/manicurist_photos/u1.svg" alt="">
                                                <span style="position:absolute;bottom:10px;right:10px"><i class="fa-regular fa-heart"></i></span>
                                            </div>
                                        </div>
                                        <div class="col-md-3 mb-4">
                                            <div style="position:relative">
                                                <img width="100%" class="mr-3 " src="../assets/images/manicurist_photos/u2.svg" alt="">
                                                <span style="position:absolute;bottom:10px;right:10px"><i class="fa-regular fa-heart"></i></span>
                                            </div>
                                        </div>
                                        <div class="col-md-3 mb-4">
                                            <div style="position:relative">
                                                <img width="100%" class="mr-3 " src="../assets/images/manicurist_photos/u3.svg" alt="">
                                                <span style="position:absolute;bottom:10px;right:10px"><i class="fa-regular fa-heart"></i></span>
                                            </div>
                                        </div>
                                        <div class="col-md-3 mb-4">
                                            <div style="position:relative">
                                                <img width="100%" class="mr-3 " src="../assets/images/manicurist_photos/u6.svg" alt="">
                                                <span style="position:absolute;bottom:10px;right:10px"><i class="fa-regular fa-heart"></i></span>
                                            </div>
                                        </div>
                                        <div class="col-md-3 mb-4">
                                            <div style="position:relative">
                                                <img width="100%" class="mr-3 " src="../assets/images/manicurist_photos/u7.svg" alt="">
                                                <span style="position:absolute;bottom:10px;right:10px"><i class="fa-regular fa-heart"></i></span>
                                            </div>
                                        </div>
                                        <div class="col-md-3 mb-4">
                                            <div style="position:relative">
                                                <img width="100%" class="mr-3 " src="../assets/images/manicurist_photos/u8.svg" alt="">
                                                <span style="position:absolute;bottom:10px;right:10px"><i class="fa-regular fa-heart"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                            <div class="card mt-5 mb-5">
                                <div class="card-header ">
                                    <div class="float-right">
                                        <button class="btn btn-primary">Upload a new certificate</button>
                                    </div>
                                </div>
                                <div class="card-body">

                                    <a target="_blank" href="../assets/images/manicurist_certs/u8.png">
                                        <img class="mr-3 mb-3" width="30%" src="../assets/images/manicurist_certs/u8.png" alt="">
                                    </a>
                                    <a target="_blank" href="../assets/images/manicurist_certs/u9.png">
                                        <img class="mr-3 mb-3" width="30%" src="../assets/images/manicurist_certs/u9.png" alt="">
                                    </a>
                                    <a target="_blank" href="../assets/images/manicurist_certs/u10.png">
                                        <img class="mr-3 mb-3" width="30%" src="../assets/images/manicurist_certs/u10.png" alt="">
                                    </a>
                                    <a target="_blank" href="../assets/images/manicurist_certs/u11.png">
                                        <img class="mr-3 mb-3" width="30%" src="../assets/images/manicurist_certs/u11.png" alt="">
                                    </a>

                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                            <div class="card mt-5 mb-5">
                                <div class="card-body">




                                    <div class="rectangle mb-3 text-left">
                                        <div>
                                            <span class="text-muted">2023-10-18</span>
                                            <span class="float-right text-muted">J*h***D*e</span>
                                        </div>
                                        I had a pedicure at Siegel's last week and it was an
                                        amazing treatment, I get lots of compliments every day
                                    </div>
                                    <div class="rectangle mb-3 text-left">
                                        <div>
                                            <span class="text-muted">2023-10-20</span>
                                            <span class="float-right text-muted">J*an**Do*</span>
                                        </div>
                                        A week and a half ago I had a gel manicure at Segal's and it is already
                                        starting to peel on two of my nails. Really sucks
                                    </div>
                                </div>

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
        $(".inspiration-wall img").click(function() {
            alert('Thanks. Your color is selected. See you in next appointment.');
            window.location = 'inspiration-wall.php';
        })

    </script>


</body>

</html>
