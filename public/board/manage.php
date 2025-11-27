<?php
require_once("loader.php");
session_start();
$profiles = new Profiles();
$causelist = new Causelist();
$v = new Validator();
$import = new Import();
$selected = false;
$all_days = array();
$user = array();
$msg = array();
$success = '';

if (!isset($_SESSION['user_data']['username']) || $_SESSION['user_data']['userrole'] == 0) {
    header('Location: unauthorised.php');
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['editUser'])) {
        $uid = $v->valid($_POST['userId']);
        if (is_numeric($uid)) {
            $selected = true;
            if ($profiles->get_user_details($uid)) {
                $user = $profiles->get_result();
            } else {
                array_push($msg, 'Unable to get user data');
            }
        }
    }
    if (isset($_POST['delUser'])) {
        $uid = $v->valid($_POST['userId']);
        if (is_numeric($uid)) {
            if ($profiles->delete_user($uid)) {
            } else {
                array_push($msg, 'Failed to delete user');
            }
        }
    }
    if (isset($_POST['changeData'])) {
        $flag = 0;
        $uid = $v->valid($_POST['userId']);
        $u_name = $v->valid($_POST['userName']);
        $u_pass = $v->valid($_POST['newPass']);
        if ($v->valid_user($u_name)) {
            $flag++;
        } else {
            $flag = 0;
            array_push($msg, implode(', ', $v->get_err_array()));
        }
        if (!empty($u_pass)) {
            if(strlen($u_pass) >= 6) {
                if (!preg_match('/[0-9]/', $u_pass)) {
                    $flag = 0;
                    array_push($msg, 'Password must contain at least one digit');
                }
            } else {
                $flag = 0;
                array_push($msg, 'Password must be at least 6 characters long');
            }
        } else {
            $flag++;
        }
        $full_name = $v->valid($_POST['fullName']);
        $role = $v->valid($_POST['roleUser']);
        $details = $v->valid($_POST['userDetails']);
        if (is_numeric($uid) && $flag >= 2) {
            //echo $uid,$full_name,$u_name,$u_pass,$role,$details;
            if ($profiles->update_user($uid, $full_name, $u_name, $u_pass, $role, $details)) {
                $success = '<div class="alert alert-success shadow-sm text-center" role="alert">Profile updated succesfully</div>';
            } else {
                array_push($msg, 'Failed to update user details');
            }
        }
    }
    if (isset($_POST['removeData'])) {
        if (isset($_POST['causeList'])) {
            $clist = $v->valid($_POST['causeList']);
            if ($causelist->deleteData($clist)) {
                $success = '<div class="alert alert-success shadow-sm text-center" role="alert">Cause list removed</div>';
            }
        }
    }
    if (isset($_POST['removeFrom'])) {
        if (isset($_POST['dateFrom'])) {
            $before = $v->valid($_POST['dateFrom']);
            if ($causelist->delete_before($before)) {
                $success = '<div class="alert alert-success shadow-sm text-center" role="alert">Cause list removed</div>';
            }
        }
    }
    if (isset($_POST['uploadJson'])) {
        if (empty($_FILES['jsonCauselist']['name'])) {
            $success = 'Select .json file';
        } else {
            if ($import->uploadJsonBench($_FILES['jsonCauselist'])) {
                $success = '<div class="alert alert-success shadow-sm text-center" role="alert">Benches Imported</div>';
            } else {
                array_push($msg, implode(', ', $import->get_err_array()));
            }
        }
    }
}

$causelist->view_causelist_all();
$all_days = $causelist->get_result();

if ($profiles->get_users()) {
    $users = $profiles->get_result();
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MANAGE</title>
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
        if (!empty($msg)) {
            foreach ($msg as $m) {
                echo '<div class="alert alert-warning alert-dismissible fade show text-center" role="alert">' . $m . '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div><br>';
            }
        } else {
            echo '<br>';
        }
        if (!empty($success)) {
            echo $success;
        }
        ?>
        <div class="card">
            <div class="card-body">
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
                    <div class="d-flex justify-content-between">
                        <div class="fw-light text-primary">IMPORT BENCHES<span class="fst-italic"> (.json)</span></div>
                        <a class="btn btn-sm btn-primary" style="box-shadow: 1px 2px 2px #999999;" href="view.php">View Latest Benches</a>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col">
                            <input type="file" class="form-control" id="jsonCauselist" name="jsonCauselist" required>
                        </div>
                        <div class="col">
                            <button type="submit" class="btn btn-sm btn-primary" style="box-shadow: 1px 2px 2px #999999;" name="uploadJson" onclick="return confirm('Import Benches? ');"> IMPORT </button>
                        </div>
                    </div>
                    <br>
                </form>
            </div>
        </div>
        <br>
        <?php
        if (!empty($all_days)) {
            echo '<div class="card shadow-sm">
            <div class="card-body">';
            echo '<div class="row"><div class="col"><div class="form-text text-primary">ALL UPLOADED CAUSE LIST</div></div></div><br>';
            echo '<form action="' . htmlspecialchars($_SERVER["PHP_SELF"]) . '" method="post">
            <div class="row">
            <div class="col">
            <div class="form-floating">
            <select class="form-select" id="floatingSelect" name="causeList" aria-label="Floating label" required>
            <option value="" selected> Select Cause List </option>';
            foreach ($all_days as $x) {
                echo '<option value="' . $x['c_id'] . '"> ' . $x['c_date_formatted'] . ' / Court ' . $x['c_number'] . ' / ' . $x['c_bench'] . '-' . $x['bench_desc'] . ' / ' . $x['ct_name'] . '</option>';
            }
            echo '</select><label for="floatingSelect">Date/Court No./Bench/Cause List Type</label></div></div>';
            echo '<div class="col">';
            echo "<button type=\"submit\" class=\"btn btn-sm btn-danger\" style=\"box-shadow: 1px 2px 2px #999999;\" name=\"removeData\" onclick=\"return confirm('Remove Causelist ?');\">Remove</button></div>";
            echo '</form></div><br>';
            echo '<form action="' . htmlspecialchars($_SERVER["PHP_SELF"]) . '" method="post">
            <div class="form-text text-primary">REMOVE FROM GIVEN DATE AND ALL EARLIER DATES</div><br>
            <div class="row">
                <div class="col"><input type="date" name="dateFrom" class="form-control"></div>';
            echo '<div class="col">';
            echo "<button type=\"submit\" class=\"btn btn-sm btn-danger\" style=\"box-shadow: 1px 2px 2px #999999;\" name=\"removeFrom\" onclick=\"return confirm('Remove Selected Causelist ?');\">Remove</button>";    
            echo '</div></div>
            </form><br>
            </div>
            </div>';
        }
        ?>
        <br>
        <div class="card">
            <div class="card-body">
                <?php
                if ($selected == false) {
                    echo '<div class="d-flex justify-content-between">
                        <div class="text-primary fw-light">USER LIST</div>
                        <a class="btn btn-sm btn-primary" href="logs.php" style="box-shadow: 1px 2px 2px #999999;" name="addUser">View Logs</a>
                        <a class="btn btn-sm btn-primary" href="addUser.php" style="box-shadow: 1px 2px 2px #999999;" name="addUser">ADD NEW USER</a>
                    </div><br><br>
                    <div class="row text-center fw-bold"><div class="col-1">#</div><div class="col">Username</div><div class="col">Full Name</div><div class="col">Privileges</div><div class="col">Actions</div></div><br>';
                    foreach ($users as $u) {
                        if ($u['user_role'] == 1) {
                            $role = 'Admin';
                        } else {
                            $role = '-';
                        }
                        echo '<div class="row text-center p-2"><div class="col-1">' . (int) $u['user_id'] . '</div><div class="col">' . $u['user_name'] . '</div><div class="col">' . $u['user_fullname'] . '</div><div class="col">' . $role . '</div>';
                        echo '<div class="col">
                    <form action="' . htmlspecialchars($_SERVER["PHP_SELF"]) . '" method="post">
                    <input type="hidden" name="userId" value="' . $u['user_id'] . '">
                    <button type="submit" name="editUser" class="btn btn-sm btn-primary" style="box-shadow: 1px 2px 2px #999999;">Edit</button>';
                        echo "&nbsp; <button type=\"submit\" class=\"btn btn-sm btn-danger\" style=\"box-shadow: 1px 2px 2px #999999;\" name=\"delUser\" onclick=\"return confirm('Comfirm Delete ?');\">Delete</button>";
                        echo '</form>
                    </div>
                    </div>';
                    }
                } else {
                    if (!empty($user)) {
                        echo '<form action="' . htmlspecialchars($_SERVER["PHP_SELF"]) . '" method="post">
                        <input type="hidden" name="userId" value="' . $user['user_id'] . '">';
                        echo '<div class="row"><div class="col"><span class="text-primary fw-bold">User Details</span></div></div>';
                        echo '<br><div class="row"><div class="col"><div class="form-floating">
                        <input type="text" class="form-control" value="' . $user['user_name'] . '" name="userName" required>
                        <label for="floatingSelect">Username <span class="text-danger fw-bold">*</span></label>
                        <span class="form-text fst-light fst-italic">&nbsp; 03 - 99 characters, Alphanumeric Only</span>
                        </div></div>
                        <div class="col"><div class="form-floating">
                        <input type="text" class="form-control" value="' . $user['user_fullname'] . '" name="fullName" required>
                        <label for="floatingSelect">Full Name <span class="text-danger fw-bold">*</span></label>
                        </div></div>
                        </div>';

                        echo '<br><div class="row"><div class="col">
                        <div class="form-floating">
                        <select class="form-select" id="floatingSelect" name="roleUser" aria-label="Floating label" required>';
                        if ($user['user_role'] == 0) {
                            echo '<option value="0" selected>Normal</option>';
                            echo '<option value="1">Admin</option>';
                        } else if ($user['user_role'] == 1) {
                            echo '<option value="1" selected>Admin</option>';
                            echo '<option value="0">Normal</option>';
                        }
                        echo '</select><label for="floatingSelect">Role</label>';
                        echo '</div></div>
                        <div class="col"><div class="form-floating">
                        <input type="password" class="form-control" name="newPass" value="">
                        <label for="floatingSelect">Password <span class="text-danger fst-italic"> &nbsp; ( Leave empty if no change is needed. )</span></label>
                        </div></div>
                        </div>';
                        echo '<br><div class="row"><div class="col"><div class="form-floating">
                        <input type="text" class="form-control" value="' . $user['user_details'] . '" name="userDetails">
                        <label for="floatingSelect">Details</label>
                        </div></div>
                        </div>';
                        echo '<br><div class="d-flex justify-content-evenly">
                                <div><a href="manage.php" class="btn btn-primary" style="box-shadow: 1px 2px 2px #999999;">Cancel</a></div>';
                        echo "<div><button type=\"submit\" class=\"btn btn-warning\" style=\"box-shadow: 1px 2px 2px #999999;\" name=\"changeData\" onclick=\"return confirm('Confirm Change ?');\">Submit</button>";
                        echo '</div>
                        </div>';
                        echo '</form>';
                    }
                }
                ?>
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