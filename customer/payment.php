<?php
include 'auth.php';
if(isset($_POST['treatment_id'])){
    $stmt = $sql->prepare("INSERT INTO bookings (date, time, manicurist_id, treatment_id, customer_id) 
            VALUES (?, ?, ?, ?, ?)");
    $stmt->bindParam(1, $_POST['date'], PDO::PARAM_STR);
    $stmt->bindParam(2, $_POST['time'], PDO::PARAM_STR);
    $stmt->bindParam(3, $_POST['manicurist_id'], PDO::PARAM_STR);
    $stmt->bindParam(4, $_POST['treatment_id'], PDO::PARAM_STR);
    $stmt->bindParam(5, $customerid, PDO::PARAM_STR);
    $stmt->execute();
    header("location:index.php?booking_success");
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

    </style>
</head>

<body>
    <?php include 'nav.php'; ?>
    <div class="container">
        <div class="row justify-content-center mt-3">
            <div class="col-md-6">
                <div class="card mt-5 mb-5 shadow">
                    <div class="card-body">
                        <div class="">
                            <h2 class="text-center mb-4">Select Payment Method</h2>
                            <div class="text-center cards">
                                <img id="card_payment" class="mr-5" src="../assets/images/card.svg" alt="">
                                <img class="mr-5 confirm_payment" src="../assets/images/paybox.svg" alt="">
                                <img class="confirm_payment" src="../assets/images/bit.svg" alt="">
                            </div>
                        </div>
                        <div style="display:none" id="payment_form" class="mt-5 mb-5">
                                <div class="text-center mb-3">
                                    <img class="mr-3" src="../assets/images/visa.svg" alt="">
                                    <img class="mr-3" src="../assets/images/mastercard.svg" alt="">
                                    <img class="mr-3" src="../assets/images/american.svg" alt="">
                                    <img src="../assets/images/discover.svg" alt="">
                                </div>
                                <div class="form-group">
                                    <label for="cardName">Cardholder Name</label>
                                    <input type="text" class="form-control" id="cardName" placeholder="Enter cardholder name" required>
                                </div>
                                <div class="form-group">
                                    <label for="cardNumber">Card Number</label>
                                    <input type="text" class="form-control" id="cardNumber" placeholder="Enter card number" required>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label for="cardExpiryMonth">Expiration Month</label>
                                        <select class="form-control" id="cardExpiryMonth" required>
                                            <option value="">Month</option>
                                            <option value="01">01</option>
                                            <option value="02">02</option>
                                            <option value="03">03</option>
                                            <option value="04">04</option>
                                            <option value="05">05</option>
                                            <option value="06">06</option>
                                            <option value="07">07</option>
                                            <option value="08">08</option>
                                            <option value="09">09</option>
                                            <option value="10">10</option>
                                            <option value="11">11</option>
                                            <option value="12">12</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="cardExpiryYear">Expiration Year</label>
                                        <select class="form-control" id="cardExpiryYear" required>
                                            <option value="">Year</option>
                                            <option value="2024">2024</option>
                                            <option value="2025">2025</option>
                                            <option value="2026">2026</option>
                                            <option value="2027">2027</option>
                                            <option value="2028">2028</option>
                                            <option value="2029">2029</option>
                                            <option value="2030">2030</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="cardCVV">CVV</label>
                                        <input type="text" class="form-control" id="cardCVV" placeholder="Enter CVV" required>
                                    </div>
                                </div>
                                <button class="btn btn-primary confirm_payment w-100"><i class="fas fa-lock mr-2"></i> Confirm Payment</button>
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



    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    
    <script>
        $("#card_payment").click(function(){
            $("#payment_form").show();
        });
        
        $(".confirm_payment").click(function(){
            var cardName = $("#cardName").val();
            if(cardName!=""){
                alert('Thank you for your payment, '+cardName);
            }else{
                alert('Thank you for your payment.');
            }
            
            $("#booking_form").submit();
            
        });
    
    </script>
    
</body>

</html>
