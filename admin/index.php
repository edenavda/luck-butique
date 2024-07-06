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
        .rectangle {
            border: 2px solid grey;
        }

        .progress-bar {
            display: flex;
            justify-content: center;
            align-items: center;

            width: 100px;
            height: 100px;
            border-radius: 50%;
            background:
                radial-gradient(closest-side, white 79%, transparent 80% 100%),
                conic-gradient(hotpink 30%, pink 0);
        }
        
        .progress-bar-2{
            background:
                radial-gradient(closest-side, white 79%, transparent 80% 100%),
                conic-gradient(hotpink 10%, pink 0);
        }
        
        .progress-bar-3{
            background:
                radial-gradient(closest-side, white 79%, transparent 80% 100%),
                conic-gradient(hotpink 90%, pink 0);
        }

        .progress-bar::before {
            content: "6";
            color: black;
        }
        
         .progress-bar-2::before {
            content: "3%";
            color: black;
        }
        
        .progress-bar-3::before {
            content: "238";
            color: black;
        }

    </style>
</head>

<body>
    <?php include 'nav.php'; ?>
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-3">
                <div class="rectangle text-center">
                    <p>Monthly Income</p>
                    <h1>139.9K</h1>
                </div>
            </div>
        </div>
        <div class="row  justify-content-center mt-5">
            <div class="col-md-12 text-center">
                <h3 class="mb-5">Data of the week</h3>
            </div>
            <div class="col-md-2">
                <div class="progress-bar">
                    <progress value="3" min="0" max="100" style="visibility:hidden;height:0;width:0;">6</progress>
                </div>
                <p class="mt-3">New Customers</p>
            </div>
            <div class="col-md-2">
                <div class="progress-bar progress-bar-2">
                    <progress value="10" min="0" max="100" style="visibility:hidden;height:0;width:0;">6</progress>
                </div>
                <p class="mt-3">Appointment Cancellations</p>
            </div>
            <div class="col-md-2">
                <div class="progress-bar progress-bar-3">
                    <progress value="75" min="0" max="100" style="visibility:hidden;height:0;width:0;">6</progress>
                </div>
                <p class="mt-3">Number of treatments</p>
            </div>
        </div>
        
        <div class="row  justify-content-center mb-5 mt-5">
            <div class="col-md-12 text-center">
                <a class="btn btn-primary" href="add-new-color.php">Add New Color</a>
                <a class="btn btn-primary" href="manicurists.php">View Manicurists</a>
            </div>
        </div>
        
        
    </div>



    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</body>

</html>
