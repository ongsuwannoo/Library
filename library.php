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
    <title>Library</title>

    <script src="script.js"></script>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

    <link href="style.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <div class="d-flex justify-content-center h-100">
            <div class="card A">
                <div class="form-group">
                    <input type="submit" value="reserve" onclick="location.href='reserve.php'" class="btn float-right login_btn">
                </div>
                <table class="table table-hover table-dark" id="table0">
                    <thead>
                        <tr>
                            <th scope="col">&#3621;&#3635;&#3604;&#3633;&#3610;&#3607;&#3637;&#3656;</th>
                            <th scope="col">&#3594;&#3639;&#3656;&#3629;&#3612;&#3641;&#3657;&#3592;&#3629;&#3591;</th>
                            <th scope="col">&#3623;&#3633;&#3609;&#3648;&#3623;&#3621;&#3634;&#3607;&#3637;&#3656;&#3592;&#3629;&#3591;</th>
                            <th scope="col">&#3623;&#3633;&#3609;&#3648;&#3623;&#3621;&#3634;&#3607;&#3637;&#3656;&#3626;&#3656;&#3591;&#3588;&#3639;&#3609;</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
                <div class="form-group">
                    <input type="submit" value="logout" onclick="location.href='logout.php'" class="btn float-right login_btn">
                </div>
            </div>
        </div>
    </div>
<?php
$sql = "SELECT * FROM room";
// echo $sql;
$result = confetch($sql);
// print_r($result);
echo "<script type='text/javascript'>
    window.onload = function(){ rent(".json_encode($result).")}
</script>";
// rent();
?>
</body>
</html>
