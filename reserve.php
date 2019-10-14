<?php
session_start();
include('function.php');
if ($_SESSION['login_status'] == 0){
    header('Location: login.php');
}
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reserve</title>

    <script src="script.js"></script>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

    <link href="style.css" rel="stylesheet">
</head>

<body>
    <?php
        if (sizeof($_POST) > 0) {
        $data = $_POST;
        $status_error = 0;
        if ($data['form'] == 'Reserve') {
            $user_id = $_SESSION['uid'];
            $guest = $data['guset'];
            $booked_time = $data['booked_time']+" "+$data['booked_time2'];
            $checkout = $data['checkout']+" "+$data['checkout2'];
            $sql = "INSERT INTO room
            (user_id,guest,booked_time,checkout)
            VALUES
            ('$user_id','$guest', '$booked_time', '$checkout')";
            $con = con();
            mysqli_query($con, $sql);
            header('Location: library.php');
        }
    }
    ?>
    <div class="container">
        <div class="d-flex justify-content-center h-100">
            <form method="POST" class="m-5">
                <br><br><br>
                <input type="text" name="guest" placeholder="ชื่อผู้จอง" required="">
                <br><br>
                <input type="text" name="booked_time" placeholder="วันที่จอง (2000-12-31)" required="">
                <input type="text" name="booked_time2" placeholder="เวลาที่จอง (11:42)" required="">
                <br><br>
                <input type="text" name="checkout" placeholder="วันที่คืน (2000-12-31)" required="">
                <input type="text" name="checkout2" placeholder="เวลาที่คืน (11:42)" required="">
                <br><br><br>
                <div class="form-group">
                    <input type="submit" name="form" value="Reserve" class="btn float-right login_btn">
                </div>
            </form>
        </div>
    </div>
</body>
</html>
