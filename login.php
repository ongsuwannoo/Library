<?php
include('function.php');
session_start();
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
<?php
if (sizeof($_POST) > 0) {
    $data = $_POST;
    $status_error = 0;
    if ($data['form'] == 'Login') {
        $username = $data['username'];
        $password = $data['password'];
        $sql = "SELECT * FROM user WHERE username = '$username';";
    }
    $result = confetch($sql);
    if ($result[0]['password'] == hash('md5', $data['password'])) {
        $_SESSION['login_status'] = 1;
        $_SESSION['username'] = $data['username'];
        $_SESSION['uid'] = $result[0]['id'];
        $_SESSION['role'] = $result[0]['role'];
        $_SESSION['email'] = $result[0]['email'];
        $_SESSION['login_status'] = 1;
        header('Location: library.php');
    }
    else{
        $status_error = 1;
    }
}
?>
<body>
    <div class="container">
        <div class="d-flex justify-content-center h-100">
            <div class="card">
                <div class="card-header">
                    <h3>Sign In</h3>
                </div>
                <div class="card-body">
                    <form method="POST">
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <!-- user pic -->
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                            </div>
                            <input type="text" class="form-control" name="username" placeholder="username" required="">
                        </div>
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <!-- key pic -->
                                <span class="input-group-text"><i class="fas fa-key"></i></span>
                            </div>
                            <input type="password" class="form-control" name="password" placeholder="password" required>
                        </div>
                        <?php
                            if ($status_error == 1) { ?>
                                <sp class="">
                                    <?php echo "Username or Password is incorrect"; ?>
                                </sp>
                        <?php } ?>
                        <div class="form-group">
                            <input type="submit" name="form" value="Login" class="btn float-right login_btn">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
