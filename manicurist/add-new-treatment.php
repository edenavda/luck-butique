<?php
include 'auth.php';
if(isset($_POST['submit'])){
    $target_dir = "../assets/images/treatments/";
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION));
    $filename = uniqid(time()).'.'.$imageFileType;
    $target_file = $target_dir . $filename;
    $allowedFormats = ['jpg', 'jpeg', 'png', 'gif'];
    if(!in_array($imageFileType, $allowedFormats)) {
        $msg = "<div class='alert alert-danger'>Sorry, only JPG, JPEG, PNG & GIF files are allowed.</div>";
        $uploadOk = 0;
    }else{
        move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
        $stmt = $sql->prepare("INSERT INTO treatments (name, image, price, description) 
        VALUES (?, ?, ?, ?)");
        $stmt->bindParam(1, $_POST['name'], PDO::PARAM_STR);
        $stmt->bindParam(2, $filename, PDO::PARAM_STR);
        $stmt->bindParam(3, $_POST['price'], PDO::PARAM_STR);
        $stmt->bindParam(4, $_POST['description'], PDO::PARAM_STR);
        $stmt->execute();
        $treatmentid = $sql->lastInsertId();

        $stmt = $sql->prepare("INSERT INTO manicurist_treatment (manicurist_id, treatment_id) 
        VALUES (?, ?)");
        $stmt->bindParam(1, $manicuristdata['id'], PDO::PARAM_STR);
        $stmt->bindParam(2, $treatmentid, PDO::PARAM_STR);
        $stmt->execute();
        $msg = "<div class='alert alert-success'>Treatment added successfully.</div>";
    }
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
                <?php if(isset($msg)){ echo $msg; } ?>
                <h2 class="text-center mt-3 mb-3">Add New Treatment</h2>

                <div class="card mb-5 " style="background:rgba(224, 160, 162, 0.9568627450980393)">
                    <div class="card-body">
                        
                        <form action="" method="post" enctype="multipart/form-data">


                            <div class="form-group">
                                <label for="">Treatment Name</label>
                                <input type="text" class="form-control" name="name" required>
                            </div>
                            <div class="form-group">
                                <label for="">Price</label>
                                <input type="text" class="form-control" name="price" required>
                            </div>
                            <div class="form-group">
                                <label for="">Description</label>
                                <input type="text" class="form-control" name="description" required>
                            </div>
                            <div class="form-group">
                                <label for="">Image</label><br>
                                <input type="file" class="" name="image" id="image_upload" required style="display:none" accept="image/*">
                                <button class="btn btn-primary" type="button" onclick="$('#image_upload').trigger('click')">Select photo from device</button>
                                <p class="mt-3" id="selected_image_div" style="display:none">Selected Image: <br> <span id="selected_image"></span></p>
                            </div>

                            <div class="float-right">
                                <button class="btn btn-primary" id="" name="submit">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>





    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    
    <script>
        $(document).ready(function() {
            $('#image_upload').on('change', function() {
                var file = $(this)[0].files[0];
                if (file) {
                    $('#selected_image_div').show();
                    $('#selected_image').text(file.name);
                } else {
                    $('#selected_image').text('No image selected');
                }
            });
        });
    </script>

    



</body>

</html>
