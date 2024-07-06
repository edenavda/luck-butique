<?php
include 'auth.php';
if(isset($_GET['manicurist_id'])){
    $manicuristid = $_GET['manicurist_id'];
    $query = "SELECT * from manicurists where id=?";
    $stmt = $sql->prepare($query);
    $stmt->bindParam(1, $manicuristid, PDO::PARAM_STR);
    $stmt->execute();
    $manicurist = $stmt->fetch(PDO::FETCH_ASSOC);
}else{
    header("location:index.php");
    die();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="stylesheet" href="../assets/css/main.css?<?php echo time(); ?>">
    <style>
        .cards img {
            border: 1px solid #ddd;
            border-radius: 20px;
        }


        #image-results img {
            margin: 10px;
            width: 250px;
            height: 250px;
            cursor: pointer;

        }

    </style>
</head>

<body>
    <?php include 'nav.php'; ?>
    <div class="container">
        <div class="row justify-content-center mt-3">
            <div class="col-md-6">
                <h2 class="text-center mt-3 mb-3">Add Review</h2>
                <div class="mt-5 mb-5">
                    <div class="mb-5 text-center">
                        <h2 class="mb-3 heading"><b><?php echo $manicurist['name']; ?></b></h2>
                        <div class="mb-3"><img src="../assets/images/manicurists/<?php echo $manicurist['image']; ?>" alt=""></div>

                    </div>
                </div>
                <div class="card mb-5 shadow" style="background:rgba(224, 160, 162, 0.9568627450980393)">
                    <div class="card-body">
                        
                        <div class="">
                           
                            <div class="form-group text-center">
                                <img src="../assets/images/cry.svg" alt="">
                                 <input style="width:70%" type="range" min="1" max="5" value="3">
                                <img src="../assets/images/happy.svg" alt="">
                            </div>
                           
                            <div class="form-group">
                                <label for="">Tell us what you think about the treatment you get</label>
                                <textarea name="" class="form-control" id="" cols="30" rows="3"></textarea>
                            </div>
                            
                            <div class="float-right">
                                <button class="btn btn-primary" id="submit-review">Submit</button>
                            </div>
                            
                            
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>

    <form style="display:none" action="" id="booking_form" method="post">
        <input type="hidden" name="treatment_id" value="<?php echo $_GET['treatment_id']; ?>">
        <input type="hidden" name="manicurist_id" value="<?php echo $_GET['manicurist_id']; ?>">
        <input type="hidden" name="time" value="<?php echo $_GET['time']; ?>">
        <input type="hidden" name="date" value="<?php echo $_GET['date']; ?>">
    </form>



    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


    <script>
       
        $(document).on('click', '#submit-review', function() {
            alert('Your opinion has been successfully received in the system, thank you.');
            window.location = 'manicurist-details.php?id=<?php echo $manicuristid; ?>';
        });

    </script>

</body>

</html>
