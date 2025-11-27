<?php

require_once("loader.php");
session_start();

if (!isset($_SESSION['user_data']['username'])) {
    header('Location: unauthorised.php');
}

$list = array();

$total = 100;
$split = 5;

$report = new Reports();
if ($report->last_benches($total)) {
    $list = $report->get_result();
    $limit = ceil(count($list) / $split);
} else {
    $limit = 0;
}

if (!isset($_SESSION['user_data']['bench_page_right'])) {
    $_SESSION['user_data']['bench_page_left'] = 0;
    $_SESSION['user_data']['bench_page_right'] = $limit * 1;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['prevPage'])) {
        $_SESSION['user_data']['bench_page_left'] = 0;
        $_SESSION['user_data']['bench_page_right'] = $limit * 1;
    }
    if (isset($_POST['nextPage'])) {
        $_SESSION['user_data']['bench_page_left'] = $limit * 2;
        $_SESSION['user_data']['bench_page_right'] = $limit * 3;
    }
}

$left = array_slice($list, $_SESSION['user_data']['bench_page_left'], $limit);
$right = array_slice($list, $_SESSION['user_data']['bench_page_right'], $limit);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Benches</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
</head>

<body>
    <div class="container">
        <div class="card bg-transparent border-0">
            <div class="card-body text-center">
                <a class="text-decoration-none text-primary-emphasis fs-4" href="index.php">
                    <img src="res/logo-01.png" alt="logo" width="50" height="50"> <span class="fw-bold">&nbsp;GAUHATI HIGH COURT KOHIMA BENCH</span>
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
                            <a class="nav-link" target="_blank" href="display/">DISPLAY</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="dashboard.php">DASHBOARD</a>
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
        <br>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <div class="d-flex justify-content-between">
                <button type="submit" name="prevPage" class="btn btn-sm btn-primary" style="box-shadow: 1px 2px 2px #999999;">Previous</button>
                <button type="submit" name="nextPage" class="btn btn-sm btn-primary" style="box-shadow: 1px 2px 2px #999999;">Next</button>
            </div>
        </form>
        <br>
        <div class="row row-cols-1 row-cols-lg-2 g-2">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-2"><span class="fw-bold">Bench ID</span></div>
                            <div class="col-3"><span class="fw-bold">Bench Type</span></div>
                            <div class="col"><span class="fw-bold">Short Description</span></div>
                        </div>
                        <br>
                        <?php
                        foreach ($left as $l) {
                            if ($l['bench_type_code'] == 1) {
                                $type = 'Single';
                            } else if ($l['bench_type_code'] == 2) {
                                $type = 'Division';
                            }
                            echo '<div class="row"><div class="col-2">' . $l['court_no'] . '</div><div class="col-2">' . $type . '</div><div class="col">' . $l['bench_desc'] . '</div></div>';
                        }
                        ?>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-2"><span class="fw-bold">Bench ID</span></div>
                            <div class="col-3"><span class="fw-bold">Bench Type</span></div>
                            <div class="col"><span class="fw-bold">Short Description</span></div>
                        </div>
                        <br>
                        <?php
                        foreach ($right as $r) {
                            if ($r['bench_type_code'] == 1) {
                                $type = 'Single';
                            } else if ($r['bench_type_code'] == 2) {
                                $type = 'Division';
                            }
                            echo '<div class="row"><div class="col-2">' . $r['court_no'] . '</div><div class="col-2">' . $type . '</div><div class="col">' . $r['bench_desc'] . '</div></div>';
                        }
                        ?>
                    </div>
                </div>
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
        <br>
    </div>
</body>

</html>