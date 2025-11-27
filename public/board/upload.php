<?php
require_once("loader.php");
session_start();

$import = new Import();
$v = new Validator();
$causelist = new Causelist();
$remarks = '';
$msg = array();
$success = array();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['uploadJson'])) {
        if (empty($_FILES['jsonCauselist']['name'])) {
            array_push($msg, 'Select .json file');
        } else {
            if (!empty($_POST['remarks'])) {
                $remarks = $v->valid($_POST['remarks']);
            }
            if ($import->uploadJson($_SESSION['user_data']['userid'], $_FILES['jsonCauselist'], $remarks)) {
                array_push($success, '<div class="alert alert-success shadow-sm text-center" role="alert">All cases imported</div>');
            } else {
                array_push($msg, implode(', ', $import->get_err_array()));
            }
        }
    }
    if (isset($_POST['removeData'])) {
        if (isset($_POST['causeList'])) {
            $clist = $v->valid($_POST['causeList']);
            if ($causelist->deleteData($clist)) {
                array_push($success, '<div class="alert alert-success shadow-sm text-center" role="alert">Cause list removed</div>');
            }
        }
    }
}

if (!isset($_SESSION['user_data']['username'])) {
    header('Location: unauthorised.php');
}

$causelist->view_causelist_future();
$future = $causelist->get_result();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DATA IMPORT</title>
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
                            <a class="nav-link active" href="upload.php" aria-current="page">UPLOAD</a>
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
        if (!empty($msg)) {
            foreach ($msg as $m) {
                echo '<div class="alert alert-warning alert-dismissible fade show text-center" role="alert">' . $m . '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
            }
        }
        if (!empty($success)) {
            foreach ($success as $s) {
                echo $s;
            }
        }
        ?>
        <br>
        <div class="card shadow-sm">
            <div class="card-body">
                <div>IMPORT DATA <span class="fw-light fst-italic">(.json)</span></div>
                <br>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col">
                            <div class="form-floating">
                                <textarea name="remarks" class="form-control" placeholder="Comments if any.." id="floatingTextarea"></textarea>
                                <label for="floatingTextarea">Causelist comments if any..</label>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col">
                            <input type="file" class="form-control" id="jsonCauselist" name="jsonCauselist" required>
                        </div>
                        <div class="col">
                            <button type="submit" class="btn btn-sm btn-primary" style="box-shadow: 1px 2px 2px #999999;" name="uploadJson" onclick="return confirm('Import Causelist? ');"> IMPORT </button>
                        </div>
                    </div>
                    <br>
                </form>
            </div>
        </div>
        <br>
        <?php
        if (!empty($future)) {
            echo '<div class="card shadow-sm">
            <div class="card-body">';
            echo '<div class="row"><div class="col"><div class="form-text">Today\'s & Upcoming Cause List</div></div></div><br>';
            echo '<form action="' . htmlspecialchars($_SERVER["PHP_SELF"]) . '" method="post">
            <div class="row">
            <div class="col">
            <div class="form-floating">
            <select class="form-select" id="floatingSelect" name="causeList" aria-label="Floating label" required>
            <option value="" selected> Select Cause List </option>';
            foreach ($future as $x) {
                echo '<option value="' . $x['c_id'] . '"> ' . $x['c_date_formatted'] . ' / Court ' . $x['c_number'] . ' / ' . $x['c_bench'] . '-'.$x['bench_desc'].' / ' . $x['ct_name'] . '</option>';
            }
            echo '</select><label for="floatingSelect">Date/Court No./Bench/Cause List Type</label></div></div>';
            echo '<div class="col text-center">';
            echo "<button type=\"submit\" class=\"btn btn-sm btn-danger\" style=\"box-shadow: 1px 2px 2px #999999;\" name=\"removeData\" onclick=\"return confirm('Remove Causelist ?');\"> Remove </button></div>";
            echo '</div></form><br><br>
            </div>
            </div>';
        }
        ?>
    <br>
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
