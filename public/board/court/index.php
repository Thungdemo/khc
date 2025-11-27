<?php

require_once("../loader.php");
session_start();

$msg = '';
$board = new Board();

if ($board->view_by_date(3)) {
    $all_status = $board->get_result();
} else {
    $msg = 'Contact administration';
}

$tz = new DateTimeZone('Asia/Kolkata');
$timenow = new DateTime('now', $tz);
$break = new DateTime("13:10", $tz);
$resume = new DateTime("14:01", $tz);
$offduty = new DateTime("16:45", $tz);

if ($timenow > $offduty) {
    $msg = 'No live case';
    $display = false;
} else if ($timenow > $break && $timenow < $resume) {
    $msg = 'No live case';
    $display = false;
} else if (empty($all_status)) {
    $msg = 'No live case';
    $display = false;
} else {
    $display = true;
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display Board</title>
    <link rel="icon" href="../res/favicon.png" type="image/png" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
    <style>
        .blink {
            animation: blink-animation 1s steps(2, start) infinite;
            font-weight: bold;
        }

        @keyframes blink-animation {
            to {
                visibility: hidden;
            }
        }
    </style>
</head>

<body style="background-color:rgb(0, 0, 0);font-family: Arial, sans-serif;">
    <div class="container-fluid">
        <br>
        <div class="row row-cols-1">
            <div class="col text-center">
                <img src="../res/hc-180.png" alt="logo-180" width="54" height="54">
                <span class="fw-bold fs-1" style="color: #ffff00;"> &nbsp; GAUHATI HIGH COURT KOHIMA BENCH</span>
            </div>
        </div>
        <div class="row">
            <div class="col text-center">
                <span class="blink fs-2 text-danger">Live Case Proceedings</span>
            </div>
        </div>
        <br>
        <?php
        if (!empty($msg)) {
            echo '<div class="alert alert-warning alert-dismissible fade show text-center p-5" role="alert">' . $msg . '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
        };
        ?>
        <div class="row row row-cols-1 row-cols-md-2 g-2" style="font-size:54px;">
            <?php
            if ($display) {
                if (!empty($all_status)) {
                    foreach ($all_status as $c) {
                        if ($c['s_id'] == 3) {
                            echo '<div class="col">';
                            echo '<div class="card border-2"><div class="card-body" style="color: #ffff00;background-color:rgb(0, 0, 0)">';
                            echo '<div class="text-center fw-bold">Court ' . $c['c_number'] . ' (' . $c['ct_name'] . ')</div>';
                            echo '<hr><div class="row fw-bold">
                        <div class="col text-center text-light">' . $c['case_name'] . ' - ' . $c['case_regno'] . ' - ' . $c['case_year'] . '</div>
                        </div>';
                            echo '<hr><div class="row fw-bold">
                        <div class="col text-center">Item No. </div>
                        <div class="col text-center text-light">' . $c['case_sn'] . '</div>
                        </div><hr>';
                            echo '<div class="row fw-bold">
                        <div class="col text-center">Status</div>
                        <div class="col text-center text-light">' . $c['s_status'] . '</div>
                        </div>';
                            echo '</div></div>';
                            echo '</div>';
                        }
                    }
                }
            }
            ?>
        </div>
    </div>
    <script>
        setTimeout(function() {
            location.reload();
        }, 30000); //30 seconds
    </script>
</body>

</html>