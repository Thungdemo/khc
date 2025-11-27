<?php

require_once("loader.php");
session_start();
$profiles = new Profiles();
$v = new Validator();
$success = '';
$msg = array();

if (!isset($_SESSION['user_data']['username']) || $_SESSION['user_data']['userrole'] == 0) {
    header('Location: unauthorised.php');
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['addNew'])) {
        $flag = 0;
        $u_name = $v->valid($_POST['userName']);
        $u_pass = $v->valid($_POST['password']);
        $full_name = $v->valid($_POST['fullName']);
        $role = $v->valid($_POST['roleUser']);
        $details = $v->valid($_POST['userDetails']);
        if ($v->valid_password($u_pass)) {
            $flag++;
        } else {
            $flag = 0;
            array_push($msg, implode(', ', $v->get_err_array()));
        }
        if ($v->valid_user($u_name)) {
            $flag++;
        } else {
            $flag = 0;
            array_push($msg, implode(', ', $v->get_err_array()));
        }
        if ($flag >= 2) {
            if ($profiles->add_user($u_name, $full_name, $u_pass, $role, $details)) {
                $success = 'Profile added succesfully';
            } else {
                array_push($msg, 'Failed to add profile.');
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
    <title>ADD USER</title>
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
        <br>
        <?php
        if (!empty($success)) {
            echo '<div class="alert alert-success shadow-sm text-center" role="alert">' . $success . '</div>';
        }
        if (!empty($msg)) {
            foreach ($msg as $m) {
                echo '<div class="alert alert-warning alert-dismissible fade show text-center" role="alert">' . $m . '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div><br>';
            }
        }
        ?>
        <br>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="card">
                <div class="card-body">
                    <div class="form-text text-primary">ADD NEW USER</div>
                    <br>
                    <div class="row">
                        <div class="col">
                            <div class="form-floating">
                                <input type="text" class="form-control" name="userName" placeholder="floatingText" required>
                                <label for="floatingText">Username <span class="text-danger fw-bold">*</span></label>
                                <span class="form-text fst-light fst-italic">&nbsp; 03 - 99 characters, Alphanumeric Only</span>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-floating">
                                <input type="text" class="form-control" name="fullName" placeholder="floatingText2" required>
                                <label for="floatingText2">Fullname <span class="text-danger fw-bold">*</span></label>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col">
                            <div class="form-floating">
                                <input type="text" class="form-control" name="password" placeholder="floatingText3" required>
                                <label for="floatingText3">Password <span class="text-danger fw-bold">*</span></label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-floating">
                                <select class="form-select" id="floatingSelect" name="roleUser" aria-label="Floating label" required>
                                    <option value="0" selected>Normal</option>
                                    <option value="1">Admin</option>
                                </select>
                                <label for="floatingSelect">Role</label>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="form-floating">
                        <input type="text" class="form-control" placeholder="floatingText4" name="userDetails">
                        <label for="floatingText4">Details</label>
                    </div>
                    <br>
                    <div class="d-flex justify-content-evenly">
                        <div>
                            <a href="manage.php" class="btn btn-primary" style="box-shadow: 1px 2px 2px #999999;">Cancel</a>
                        </div>
                        <div>
                            <button type="submit" class="btn btn-warning" style="box-shadow: 1px 2px 2px #999999;" name="addNew">Submit</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
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
        </form>
    </div>
</body>

</html>