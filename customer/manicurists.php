<?php
include 'auth.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Our Manicurists</title>
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
        
        .manicurist-image{
            width: 150px;
            height: 150px;
            border-radius: 50%;
        }
        

    </style>
</head>

<body>
    <?php include 'nav.php'; ?>
    <div class="container">
        <div class="row mt-5">
            <div class="col-md-12">
                <h1 class="heading">Welcome, <?php echo $customerdata['firstname']; ?></h1>
                <hr>
            </div>
        </div>
        <div class="row justify-content-center mt-5">
            <div class="col-md-6">

                <div class="mt-5 mb-5">
                    <div class="mb-5 text-center">
                        <h2 class="mb-3"><b>Our Manicurists</b></h2>

                    </div>
                    <div class="row mb-5">
                        <?php
                            $stmt = $sql->prepare("select * from users where type='manicurist' AND id < 9");
                            $stmt->execute();
                            $manicurists = $stmt->fetchAll();
                            foreach($manicurists as $manicurist){
                        ?>
                        <div class="col-md-4 mb-3 text-center">
                            <?php if($manicurist['id']==1){ ?>
                            <a href="manicurist-details.php?id=<?php echo $manicurist['id']; ?>">
                                <div class="mb-3"><img class="manicurist-image" src="../assets/images/manicurists/<?php echo $manicurist['image']; ?>" alt=""></div>
                                <p class="text-dark"><?php echo $manicurist['firstname'].' '.$manicurist['lastname']; ?></p>
                            </a>
                            <?php }else{ ?>
                            <a href="#!">
                                <div class="mb-3"><img class="manicurist-image" src="../assets/images/manicurists/<?php echo $manicurist['image']; ?>" alt=""></div>
                                <p class="text-dark"><?php echo $manicurist['firstname'].' '.$manicurist['lastname']; ?></p>
                            </a>
                            <?php } ?>
                        </div>
                        <?php } ?>
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
