<?php
include 'auth.php';
$query = "SELECT a.*, CONCAT(b.firstname,' ',b.lastname) as manicurist_name, c.name as treatment_name FROM bookings as a left join users as b on a.manicurist_id=b.id left join treatments as c on a.treatment_id=c.id 
WHERE CONCAT(a.date, ' ', a.time) > NOW() AND a.customer_id='$customerid' ORDER BY CONCAT(a.date, ' ', a.time) LIMIT 1";
 $stmt = $sql->prepare($query);

// Execute the statement
$stmt->execute();
$booking = $stmt->fetch(PDO::FETCH_ASSOC);
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
        
        #imageDisplay img{
            width: 100%;
            height: 220px;
            
            border: 1px solid #ddd;
            margin-top: 15px;
        }

    </style>
</head>

<body>
    <?php include 'nav.php'; ?>
    <div class="container">
        <div class="row justify-content-center mt-3">
            <div class="col-md-6">
                <h2 class="text-center mt-3 mb-3">Booking Details</h2>
                <div class="card mb-5 shadow">
                    <div class="card-body">
                        <?php if($booking){ ?>
                        <div class="">
                            <p> Date<br><b><?php echo $booking['time']; ?> <?php echo date('d/m/Y', strtotime($booking['date'])); ?></b></p>
                            <p>Treatment <br><b><?php echo $booking['treatment_name']; ?></b></p>
                            <p>Manicurist <br><b><?php echo $booking['manicurist_name']; ?></b></p>
                            <div class="form-group">
                                <label for="">Describe your special request</label>
                                <textarea name="" class="form-control" id="" cols="30" rows="3"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="">Upload From Device</label><br>
                                <input type="file" class="" style="display:none" id="image_upload" accept="image/*">
                                <button class="btn btn-primary" type="button" onclick="$('#image_upload').trigger('click')">Select photo from device</button>
                                <div id="imageDisplay"></div>
                            </div>
                            <h3 class="text-center">OR </h3>
                            <div class="form-group mb-4">
                                <label for="">Upload From Pixabay</label><br>
                                <input type="text" id="search-term" placeholder="Search for images">
                                <button id="search-button">Search</button>

                                <div class="mt-3">
                                    <p>Select one image</p>
                                    <div class="row" id="image-results">
                                        
                                    </div>
                                </div>
                            </div>
                            <button class="btn w-100 btn-primary">Submit</button>
                        </div>
                        <?php }else{ ?>
                        <div class="text-center">
                            <p>Please make a booking first.</p>
                            <a href="make-appointment.php" class="btn btn-primary">Book now</a>
                        </div>
                        <?php } ?>
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
        
        document.getElementById('image_upload').addEventListener('change', function(event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const img = document.createElement('img');
                    img.src = e.target.result;
                    const imageDisplay = document.getElementById('imageDisplay');
                    imageDisplay.innerHTML = '';
                    imageDisplay.appendChild(img);
                };
                reader.readAsDataURL(file);
            }
        });
        
        var mydata = 0;
        $(document).ready(function() {
            $('#search-button').on('click', function(e) {
                e.preventDefault();
                var searchTerm = $('#search-term').val();
                $.ajax({
                    url: 'api.php',
                    type: 'GET',
                    data: {
                        query: searchTerm
                    },
                    success: function(response) {
                        var data = JSON.parse(response);
                        mydata = data;
                        $('#image-results').empty();
                        for (var i = 0; i < data.url.length; i++) {
                            $('#image-results').append('<div class="col-md-6 mb-3"><img style="width:100%;height:200px" class="pixabay-image" src="' + data.url[i] + '"></div>');
                        }

                    },
                    error: function() {
                        alert('Error fetching images');
                    }
                });
            });
        });

        $(document).on('click', '.pixabay-image', function() {
            alert('Your request has been delivered to your manicurist and you will get a reply in a few days');
            window.location = 'inspiration-wall.php';
        });

    </script>

</body>

</html>
