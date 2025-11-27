<?php

require_once("loader.php");
session_start();

if (!isset($_SESSION['user_data']['username'])) {
    header('Location: unauthorised.php');
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HELP</title>
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
                            <a class="nav-link active" aria-current="page" href="#">HELP</a>
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
        <div class="card">
            <div class="card-body">
                <span class="fw-bold">Display Board for public</span>
                <ol>
                    <li> Display board can be accessed without user accounts.</li>
                    <li> Display board shows status for current day.</li>
                    <li> Page is reloaded after 30 seconds.</li>
                </ol>
            </div>
        </div>
        <br>
        <div class="card">
            <div class="card-body">
                <span class="fw-bold"> Display Board for users</span>
                <ol>
                    <li> The login interface is only available for office LAN.</li>
                    <li> Select <span class="fw-bold">"Court No."</span>, <span class="fw-bold">"Bench ID"</span>, <span class="fw-bold">"Cause List Type"</span> and click <span class="fw-bold">'Submit'</span> to start updating proceedings status.</li>
                    <li> Click <span class="fw-bold">'Deselect'</span> to select another causelist, proceedings status are saved and can be resumed.</li>
                    <li> For a particular bench, only one case can be set to <span class="fw-bold">'progress'</span> state.</li>
                    <li> Whenever a cases is set to <span class="fw-bold">'progress'</span>, the case in <span class="fw-bold">'progress'</span> state is automatically set to <span class="fw-bold">'completed'</span> for a particular court.</li>
                    <li> Manage page is available for admin users only.</li>
                </ol>
            </div>
        </div>
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