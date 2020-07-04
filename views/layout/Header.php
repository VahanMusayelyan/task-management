<?php
session_start();
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $pass = $_POST['psw'];
    if ($username == 'admin' && $pass = '123') {

        $_SESSION['admin'] = "adminka";
    }
}
?>

<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <link rel="stylesheet" href="/public/style/bootstrap.min.css">
        <link rel="stylesheet" href="/public/style/style.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
        <script src="/public/js/jquery.js"></script>
        <script src="/public/js/bootstrap.min.js"></script>
        <script src="/public/js/js.js"></script>
        <title>ToDo</title>

    </head>
    <body>
        <div class="nav_bar">
            <nav class="navbar navbar-inverse">
                <div class="container-fluid container" style="padding-top: 10px">


                    <div class="topnav">
                        <a class="active btn btn-primary" href="/">Home</a>
                        <div class="login-container" style="float: right; width: 80%">
                            <?php if (isset($_SESSION['admin'])) { ?>
                                <form class="logout" action="/todos/log_out" method="POST">
                                    <button class="btn btn-danger logout" type="submit" name="logOut">Log Out</button>
                                </form>
                                <button class="btn btn-default admin" type="button" name="login" >Welcome Admin</button>


                            <?php } else { ?>


                                <form action="" method="POST" id="auth">
                                    <input class="form-control user" type="text" placeholder="Username" name="username">
                                    <input class="form-control pass" type="password" placeholder="Password" name="psw">
                                    <button class="btn btn-default" type="submit" name="login">Login</button>
                                </form>


                            <?php }
                            ?>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
