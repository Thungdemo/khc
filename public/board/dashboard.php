<?php

require_once("loader.php");
session_start();

$reports = new Reports();

if (!isset($_SESSION['user_data']['username'])) {
    header('Location: unauthorised.php');
}

/*
1	Not Available
2	Item Called
3	In Progress
4	Completed
*/

$reports->proceeding_details_all(3);
$total_progress = $reports->get_result();

$reports->proceeding_details_all(4);
$total_complete = $reports->get_result();

$reports->causelist_total();
$total_causelist = $reports->get_result();

$reports->total_cases();
$total_cases = $reports->get_result();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
</head>

<body>
    <div class="container">
        <div class="card bg-transparent border-0">
            <div class="card-body text-center">
                <a class="text-decoration-none text-primary-emphasis fs-4" href="index.php">
                    <img src="res/hc-180.png" alt="logo" width="50" height="50"> <span class="fw-bold">&nbsp;GAUHATI HIGH COURT KOHIMA BENCH</span>
                </a>
            </div>
        </div>
        <br>
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <a class="navbar-brand fw-bold" href="main.php">HOME</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="upload.php">UPLOAD</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="display/" target="_blank">DISPLAY</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="dashboard.php">DASHBOARD</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="help.php">HELP</a>
                        </li>
                    </ul>
                </div>
                <?php
                if ($_SESSION['user_data']['userrole'] == 1) {
                    echo '<div class="d-flex me-3">
                        <a class="nav-link" href="manage.php">MANAGE</a>
                        </div>';
                }
                ?>
                <div class="d-flex me-2">
                    <a class="nav-link" href="logout.php">LOGOUT</a>
                </div>
            </div>
        </nav>
        <br><br>
        <div class="card shadow-sm">
            <div class="card-body">
                <a class="btn btn-sm btn-primary" style="box-shadow: 1px 2px 2px #999999;" href="view.php">View Lastest Benches</a>
            </div>
        </div>
        <br>
        <div class="card shadow-sm">
            <div class="card-body">
                <div class="fst-italic">Today's Cases</div>
                <br>
                <div class="row row-cols-2 row-cols-lg-4 g-2">
                    <div class="col">
                        <div class="card">
                            <div class="card-body">
                                Cases in progress
                                <br>
                                <span class="fw-bold text-success"><?php echo $total_progress['total']; ?></span>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card">
                            <div class="card-body">
                                Cases completed
                                <br>
                                <span class="fw-bold text-primary"><?php echo $total_complete['total']; ?></span>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card">
                            <div class="card-body">
                                Total cases today
                                <br>
                                <span class="fw-bold text-success"><?php echo $total_cases['total']; ?></span>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card">
                            <div class="card-body">
                                Total list today
                                <br>
                                <span class="fw-bold text-primary"><?php echo $total_causelist['total']; ?></span>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
            </div>
        </div>
        <br><br><br>
        <hr>
        <div class="d-flex justify-content-evenly">
            <div>
                <small class="fw-light">&copy; 2025, Gauhati High Court Kohima Bench</small>
            </div>
            <div>
                <small class="fw-light">Designed and Developed by eCourts Team, Gauhati High Court Kohima Bench</small>
            </div>
        </div>
    </div>
</body>

</html>