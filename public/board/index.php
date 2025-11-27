<?php

require_once("loader.php");
session_start();

$v = new Validator();
$profiles = new Profiles();
$board = new Board();

$allowed = false;

if ($board->allowed_ip()) {
    $allowed = true;
} else {
    $allowed = false;
}

if (isset($_SESSION['user_data']['username'])) {
    header('Location: main.php');
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['submitForm'])) {
        $msg = '';
        $check = 0;
        if (empty($_POST["username"])) {
            $msg = '<div class="alert alert-warning shadow" role="alert">Name is required</div>';
        } else {
            $name = $v->valid($_POST["username"]);
            $check++;
        }

        if (empty($_POST["password"])) {
            $msg .= '<div class="alert alert-warning shadow" role="alert">Password is required</div>';
        } else {
            $pass = $v->valid($_POST["password"]);
            $check++;
        }

        if ($check == 2) {
            if ($profiles->authenticate($name, $pass)) {
                header('Location: main.php');
            } else {
                $msg = '<div class="alert alert-warning shadow" role="alert">Invalid Credentials</div>';
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
    <title>Causelist Online</title>
</head>

<body>
    <div class="container">
        <br>
        <div class="row text-center pt-2">
            <div class="col">
                <img src="res/hc-180.png" alt="logo" width="128" height="128">
                <h2 class="text-primary text-center fw-bold pt-2">ONLINE CASE PROCEEDINGS</h2>
                <h5 class="text-center fw-bold">GAUHATI HIGH COURT KOHIMA BENCH</h5>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col"></div>
            <div class="col">
                <?php
                if (!empty($msg)) {
                    echo $msg;
                }
                ?>
            </div>
            <div class="col"></div>
        </div>
        <br><br>
        <div class="row row-cols-1 row-cols-lg-3 g-0">
            <div class="col"></div>
            <div class="col">
                <?php
                if ($allowed) {
                    echo '<div class="card shadow p-4">
                            <form method="post" action="' . htmlspecialchars($_SERVER["PHP_SELF"]) . '">
                                <div class="card-title text-center fw-bold fs-5">Sign in</div>
                                <div class="card-body">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="floatingInput" name="username" placeholder="name@example.com">
                                        <label for="floatingInput">Username</label>
                                    </div>
                                    <div class="form-floating">
                                        <input type="password" class="form-control" name="password" id="floatingPassword" placeholder="Password">
                                        <label for="floatingPassword">Password</label>
                                    </div><br>
                                    <div class="d-flex justify-content-center">
                                        <input class="btn btn-primary" style="box-shadow: 1px 2px 2px #999999;" type="submit" name="submitForm" value="LOGIN">
                                    </div>
                                </div>
                            </form>
                        </div>';
                }
                ?>
            </div>
            <div class="col"></div>
        </div>
        <br>
        <div class="row row-cols-1 row-cols-lg-3 g-0">
            <div class="col"></div>
            <div class="col">
                <div class="card shadow p-1">
                    <div class="card-body text-center">
                        <a class="text-decoration-none" href="display/">OPEN DISPLAY BOARD</a>
                    </div>
                </div>
            </div>
            <div class="col"></div>
        </div>
        <br><br>
        <br><br>
        <hr>
        <div class="d-flex justify-content-evenly">
            <div>
                <small class="fw-light">&copy; 2025, Gauhati High Court Kohima Bench</small>
            </div>
            <div>
                <small class="fw-light">Designed and Developed by eCourts Team, Gauhati High Court Kohima Bench</small>
            </div>
        </div>
        <br>
    </div>
</body>

</html>