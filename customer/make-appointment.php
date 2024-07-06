<?php
include 'auth.php';
if (isset($_GET['start_date'])) {
    $start_date = strtotime($_GET['start_date']);
} else {
    $start_date = time()+86400; // Current timestamp if not specified
}

// Calculate the previous 7 days
$prev_start_date = strtotime("-7 days", $start_date);
if ($prev_start_date < time()) {
    $prev_start_date = time();
}

$prev_week_dates = [];
for ($i = 0; $i < 7; $i++) {
    $date = strtotime("+$i day", $prev_start_date);
    $prev_week_dates[] = [
        'date' => date("d/m", $date),
        'url' => '?start_date=' . date("Y-m-d", $prev_start_date + ($i * 24 * 3600))
    ];
}

// Calculate the next 7 days
$next_week_dates = [];
for ($i = 0; $i < 7; $i++) {
    $date = strtotime("+$i day", $start_date);
    $next_week_dates[] = [
        'date' => date("d/m", $date),
        'full_date' => date('Y-m-d', $date),
        'url' => '?start_date=' . date("Y-m-d", $start_date + ($i * 24 * 3600))
    ];
}

$first = $next_week_dates[0]['date'];
$last = $next_week_dates[count($next_week_dates) - 1]['date'];
$booking_date = date("Y-m-d", $start_date);

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
            <div class="col-md-8">
                <div class="text-center mb-3 date-range">
                    <span><a href="?start_date=<?php echo date("Y-m-d", strtotime("-7 days", $start_date)); ?>"><img src="../assets/images/prev.svg" alt=""></a></span>
                    <span class="rectangle">
                        <?php echo $first . ' - ' . $last; ?>
                    </span>
                    <span><a href="?start_date=<?php echo date("Y-m-d", strtotime("+7 days", $start_date)); ?>"><img class="next" src="../assets/images/prev.svg" alt=""></a></span>
                </div>
                <div class="mt-3 mb-3 text-center">
                    <?php foreach ($next_week_dates  as $day): ?>
                    <a href="<?php echo $day['url']; ?>" class="btn <?php if($day['full_date']==$booking_date){ echo 'btn-primary'; }else{ echo 'btn-outline-primary'; } ?> mb-1"><?php echo $day['date']; ?></a>
                    <?php endforeach; ?>
                </div>

                <div class="text-center mt-3 mb-3">
                    <button class="btn btn-secondary"><i class="fas fa-filter icon mr-2"></i> Filter By Treatment</button>
                    <button class="btn btn-secondary"><i class="fas fa-filter icon mr-2"></i> Filter By Manicurist</button>
                </div>

                <div class="row">
                    <?php
                    
                    $query = "
                            SELECT m.firstname as m_firstname, m.lastname as m_lastname, t.name as treatment_name, mt.manicurist_id, mt.treatment_id
                            FROM users m
                            JOIN manicurist_treatment mt ON m.id = mt.manicurist_id
                            JOIN treatments t ON mt.treatment_id = t.id
                            where m.type='manicurist'
                            ORDER BY m.firstname, t.name
                        ";

                    // Prepare the SQL statement for manicurists
                    $stmt = $sql->prepare($query);

                    // Execute the statement for manicurists
                    $stmt->execute();

                    // Fetch all manicurists as an associative array
                    $manicurists = $stmt->fetchAll(PDO::FETCH_ASSOC);

                    // Set the start and end times
                    $start_time = strtotime('08:00');
                    $end_time = strtotime('14:00');

                    // Interval in seconds (15 minutes)
                    $interval = 60 * 60;

                    // Initialize an array to store timeslots
                    $timeslots = array();

                    // Iterate through each interval
                    for ($i = $start_time; $i < $end_time; $i += $interval) {
                        // Format the time and add to timeslots array
                        $timeslot_start = date('H:i', $i);
                        $timeslot_end = date('H:i', $i + $interval);
                        $timeslots[] = $timeslot_start;
                    }

                    // Print the timeslots
                    foreach ($timeslots as $timeslot) {
                        foreach($manicurists as $manicurist){
                ?>
                    <div class="col-md-6 mb-3">
                        <div class="rectangle">
                            <span class="schedule"><a href="payment.php?treatment_id=<?php echo $manicurist['treatment_id']; ?>&manicurist_id=<?php echo $manicurist['manicurist_id']; ?>&time=<?php echo $timeslot; ?>&date=<?php echo $booking_date; ?>">Schedule</a></span>
                            <h4><?php echo $timeslot; ?></h4>
                            <p><?php echo $manicurist['treatment_name'] ?></p>
                            <p><?php echo $manicurist['m_firstname'].' '.$manicurist['m_lastname'] ?></p>
                        </div>
                    </div>
                    <?php }} ?>




                </div>



            </div>
        </div>
    </div>



    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>
