<?php
include 'auth.php';
if(isset($_GET['id'])){
    $manicuristid = $_GET['id'];
    $stmt = $sql->prepare("select * from users where id=? AND type='manicurist'");
    $stmt->bindParam(1, $manicuristid, PDO::PARAM_STR);
    $stmt->execute();
    $manicurist = $stmt->fetch();
}

function hideUsername($username) {
    $length = strlen($username);
    $hiddenName = '';
    for ($i = 0; $i < $length; $i++) {
        if (rand(0, 1) == 1) {
            $hiddenName .= $username[$i]; // Keep the character
        } else {
            $hiddenName .= str_repeat('*', rand(1, 3)); // Replace with random stars
        }
    }
    return $hiddenName;
}
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

    </style>
</head>

<body>
    <?php include 'nav.php'; ?>
    <div class="container">

        <div class="row justify-content-center mt-5">
            <div class="col-md-8">

                <div class="mt-5 mb-5">
                    <div class="mb-5 text-center">
                        <h2 class="mb-3 heading"><b><?php echo $manicurist['firstname'].' '.$manicurist['lastname']; ?></b></h2>
                        <div class="mb-3"><img src="../assets/images/manicurists/<?php echo $manicurist['image']; ?>" alt=""></div>

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
                                <div class="card-body">
                                    <div class="row">
                                        <?php 
                                        $stmt = $sql->prepare("select * from manicurist_images where manicurist_id=?");
                                        $stmt->bindParam(1, $manicuristid, PDO::PARAM_STR);
                                        $stmt->execute();
                                        $photos = $stmt->fetchAll();
                                        foreach($photos as $photo){

                                    ?>
                                        <div class="col-md-3 mb-4">
                                            <div style="position:relative">
                                                <img width="100%" class="mr-3" src="../assets/images/manicurist_photos/<?php echo $photo['image']; ?>" alt="">
                                                
                                            </div>
                                        </div>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                            <div class="card mt-5 mb-5">
                                <div class="card-body">
                                    <?php 
                                        $stmt = $sql->prepare("select * from manicurist_certs where manicurist_id=?");
                                        $stmt->bindParam(1, $manicuristid, PDO::PARAM_STR);
                                        $stmt->execute();
                                        $certs = $stmt->fetchAll();
                                        foreach($certs as $cert){

                                    ?>
                                    <a target="_blank" href="../assets/images/manicurist_certs/<?php echo $cert['image']; ?>">
                                        <img class="mr-3 mb-3" width="30%" src="../assets/images/manicurist_certs/<?php echo $cert['image']; ?>" alt="">
                                    </a>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                            <div class="card mt-5 mb-5">
                               
                                <div class="card-body">
                                    


                                    <?php 
                                        $stmt = $sql->prepare("select a.*, b.firstname,b.lastname from manicurist_reviews as a left join users as b on a.customer_id=b.id where a.manicurist_id=?");
                                        $stmt->bindParam(1, $manicuristid, PDO::PARAM_STR);
                                        $stmt->execute();
                                        $reviews = $stmt->fetchAll();
                                        foreach($reviews as $review){
                                            $hiddenUsername = hideUsername($review['firstname'].$review['lastname']);

                                    ?>
                                    <div class="rectangle mb-3 text-left">
                                        <div>
                                            <span class="text-muted"><?php echo $review['time']; ?></span>
                                            <span class="float-right text-muted"><?php echo $hiddenUsername; ?></span>
                                        </div>
                                        <?php echo $review['comment']; ?>
                                    </div>
                                    <?php } ?>
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