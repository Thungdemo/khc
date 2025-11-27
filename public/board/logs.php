<?php

require_once("loader.php");
session_start();

if (!isset($_SESSION['user_data']['username']) || $_SESSION['user_data']['userrole'] == 0) {
    header('Location: unauthorised.php');
}
$list = array();
$case_list = array();

$causelist = new Causelist;
$cases = new Cases;
$v = new Validator();

$causelist->view_causelist_all();
$list = $causelist->get_result();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['viewData'])) {
        $cause_id = $v->valid($_POST['causeList']);
        if ($cause_id != 0) {
            if ($cases->get_cases($cause_id)) {
                $case_list = $cases->get_result();
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
    <title>Logs</title>
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
        <br><br>
        <?php
        if (!empty($list)) {
            echo '<div class="card shadow-sm">
                    <div class="card-body">';
            echo '<div class="row"><div class="col"><div class="form-text text-primary">ALL UPLOADED CAUSE LIST</div></div></div><br>';
            echo '<form action="' . htmlspecialchars($_SERVER["PHP_SELF"]) . '" method="post">
                    <div class="row">
                    <div class="col">
                    <div class="form-floating">
                    <select class="form-select" id="floatingSelect" name="causeList" aria-label="Floating label" required>
                    <option value="" selected> Select Cause List </option>';
            foreach ($list as $x) {
                echo '<option value="' . $x['c_id'] . '"> ' . $x['c_date_formatted'] . ' / Court ' . $x['c_number'] . ' / ' . $x['c_bench'] . '-' . $x['bench_desc'] . ' / ' . $x['ct_name'] . '</option>';
            }
            echo '</select><label for="floatingSelect">Date/Court No./Bench/Cause List Type</label></div></div>';
            echo '<div class="col">';
            echo '<button type="submit" class="btn btn-sm btn-danger" name="viewData" style="box-shadow: 1px 2px 2px #999999;">Check</button></div>';
            echo '</div></form><br>
                </div>
                </div>';
        }
        ?>
        <br>
        <?php
        if (!empty($case_list)) {
            echo '<div class="card">
                <div class="card-body">';
            echo '<div class="table-responsive-sm">
                    <table class="table table-sm table-striped">
                    <thead>
                    <tr> <th>Item No.</th> <th>Case No.</th> <th>Last Update</th> <th>User</th> </tr>
                    </thead><tbody>';
            foreach ($case_list as $c) {
                if ($c['case_status'] == 1) {
                    $stats = 'Import';
                } else {
                    $stats = $c['s_status'];
                }
                echo '<tr><td>' . $c['case_sn'] . '</td><td>' . $c['case_name'] . ' - ' . $c['case_regno'] . ' - ' . $c['case_year'] . '</td><td>' . $stats . '</td><td>' . $c['user_fullname'] . '</td></tr>';
            }
            echo '</tbody></table></div>';
            echo '</div>
            </div>';
        }
        ?>
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