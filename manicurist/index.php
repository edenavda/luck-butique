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
</head>

<body>
    <?php include 'nav.php'; ?>
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-12">
                <h1 class="heading">Welcome, <?php echo $manicuristdata['firstname']; ?></h1>
                <hr>
                <div class="mt-5 mb-5">
                    <h2 class="mb-3">Your schedule for today</h2>
                    <div class="row mb-5">
                       <div class="col-md-6 mb-3">
                            <div class="rectangle">
                                
                                <h4>08:00</h4>
                                <p>Gel Manicure</p>
                                <p>Tom Anderson</p>
                            </div>
                        </div>
                        <?php
                            $date = date('Y-m-d');
                            $query = "select a.*, b.firstname, b.lastname, c.name as treatment_name from bookings as a left join users as b on a.customer_id=b.id left join treatments as c on a.treatment_id=c.id where a.date=? AND a.manicurist_id=?";
                            $stmt = $sql->prepare($query);
                            $stmt->bindParam(1, $date, PDO::PARAM_STR);
                            $stmt->bindParam(2, $manicuristdata['id'], PDO::PARAM_STR);
                            $stmt->execute();
                            $bookings = $stmt->fetchAll();
                            foreach($bookings as $booking){
                        ?>
                        <div class="col-md-6 mb-3">
                            <div class="rectangle">
                                
                                <h4><?php echo $booking['time']; ?></h4>
                                <p><?php echo $booking['treatment_name'] ?></p>
                                <p><?php echo $booking['firstname']; ?> <?php echo $booking['lastname']; ?></p>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <button class="btn btn-primary">View Special Requests</button>
                            <a href="add-new-treatment.php" class="btn btn-primary">Add New Treatment</a>
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
