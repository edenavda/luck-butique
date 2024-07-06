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
                <h1 class="heading">Welcome, <?php echo $customerdata['firstname']; ?></h1>
                <hr>
                <div class="mt-5 mb-5">
                    <h2 class="mb-3">Our Treatments</h2>
                    <div class="row mb-5">
                        <?php
                            $query = "select * from treatments";
                            $stmt = $sql->prepare($query);
                            $stmt->execute();
                            $treatments = $stmt->fetchAll();
                            foreach($treatments as $treatment){
                        ?>
                        <div class="col-md-6 d-flex mb-3">
                            <div class="card w-100">
                                <div class="card-body">
                                    <div class="list-group-treatment">
                                        <img style="width:100px;height:100px" src="../assets/images/treatments/<?php echo $treatment['image']; ?>" alt="Image 1" class="">
                                        <div>
                                            <h5><b><?php echo $treatment['name']; ?></b></h5>
                                            <p><?php echo $treatment['description']; ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                    <?php
                    $query = "SELECT a.*, b.firstname as m_firstname, b.lastname as m_lastname, c.name as treatment_name FROM bookings as a left join users as b on a.manicurist_id=b.id left join treatments as c on a.treatment_id=c.id 
                    WHERE CONCAT(a.date, ' ', a.time) > NOW() AND a.customer_id='$customerid' ORDER BY CONCAT(a.date, ' ', a.time) LIMIT 1";
                     $stmt = $sql->prepare($query);

                    // Execute the statement
                    $stmt->execute();
                    $booking = $stmt->fetch(PDO::FETCH_ASSOC);
                    
                    ?>
                    
                    
                    <h2 class="mb-3">My Next Appointment</h2>
                    <?php if($booking){ ?>
                    <div class="card">
                        <div class="card-body">
                            <span class="float-right">
                            <div class="dropdown">
                                <i class="fa fa-2x fa-edit" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></i>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="#">Update Appointment</a>
                                <a class="dropdown-item" href="#">Change Appointment</a>
                                <a class="dropdown-item" href="#">Cancel Appointment</a>
                            </div>
                        </div>
                            
                            
                            </span>
                            
                            <p><?php echo $booking['time']; ?> <?php echo date('d/m/Y', strtotime($booking['date'])); ?></p>
                            <p><?php echo $booking['treatment_name']; ?></p>
                            <p><?php echo $booking['m_firstname'].' '.$booking['m_lastname']; ?></p>
                        </div>
                    </div>
                    <?php }else{ ?>
                    <p>No bookings yet.</p>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>



    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>
