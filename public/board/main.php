<?php
require_once("loader.php");
session_start();
$today_list = array();
$cases = new Cases();
$causelist = new Causelist();
$v = new Validator();

if (!isset($_SESSION['user_data']['username'])) {
    header('Location: unauthorised.php');
}

$causelist->view_causelist();
$today_list = $causelist->get_result();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['selectCause'])) {
        if (isset($_POST['causeId'])) {
            $cause_id = $v->valid($_POST['causeId']);
            if ($cause_id != 0) {
                if ($causelist->get_causelist_details($cause_id)) {
                    $_SESSION['user_data']['cause_list_status'] = true;
                    $_SESSION['user_data']['causelist'] = $causelist->get_result();
                    if ($cases->get_cases($_SESSION['user_data']['causelist']['c_id'])) {
                        $_SESSION['user_data']['cases'] = $cases->get_result();
                    }
                } else {
                    $_SESSION['user_data']['cause_list_status'] = false;
                }
            } else {
                //deselect
                $_SESSION['user_data']['cause_list_status'] = false;
            }
        }
    }
    if (isset($_POST['caseItem'])) {
        $item = $v->valid($_POST['caseItem']);
        if ($item != 0) {
            if (isset($_POST['caseCall'])) {
                if ($cases->set_casestatus($item, 2, $_SESSION['user_data']['causelist']['c_id'], $_SESSION['user_data']['userid'])) {
                }
            } else if (isset($_POST['caseInProgress'])) {
                if ($cases->set_casestatus_bench(3, $_SESSION['user_data']['causelist']['c_id'], $_SESSION['user_data']['userid'])) {
                    if ($cases->set_casestatus($item, 3, $_SESSION['user_data']['causelist']['c_id'], $_SESSION['user_data']['userid'])) {
                    }
                }
            } else if (isset($_POST['caseCompleted'])) {
                if ($cases->set_casestatus($item, 4, $_SESSION['user_data']['causelist']['c_id'], $_SESSION['user_data']['userid'])) {
                }
            }
        }
    }
    if (isset($_POST['callAll'])) {
        if (isset($_SESSION['user_data']['causelist'])) {
            if ($cases->set_call_all_cases($_SESSION['user_data']['causelist']['c_id'], $_SESSION['user_data']['userid'])) {
            }
        }
    }
    if (isset($_POST['completeAll'])) {
        if (isset($_SESSION['user_data']['causelist'])) {
            if ($cases->set_complete_all_cases($_SESSION['user_data']['causelist']['c_id'], $_SESSION['user_data']['userid'])) {
            }
        }
    }
}

if (!isset($_SESSION['user_data']['cause_list_status'])) {
    $_SESSION['user_data']['cause_list_status'] = false;
} else {
    if (isset($_SESSION['user_data']['causelist'])) {
        if ($cases->get_cases($_SESSION['user_data']['causelist']['c_id'])) {
            $_SESSION['user_data']['cases'] = $cases->get_result();
        }
    }
}

//print_r($today_list);

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
        <div class="card shadow-sm">
            <div class="card-body">
                <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                    <div class="row">
                        <?php
                        if (isset($_SESSION['user_data']['cause_list_status'])) {
                            if ($_SESSION['user_data']['cause_list_status'] == false) {
                                echo '<div class="col"><div class="form-floating">';
                                echo '<select class="form-select" id="floatingSelect3" name="causeId" aria-label="Floating label" required>
                                    <option value="0" selected> Select Cause List</option>';
                                $courtno = 1;
                                foreach ($today_list as $x) {
                                    if ($courtno != $x['c_number']) {
                                        $courtno = $x['c_number'];
                                        echo '<option value="0"> - - - - - - - - - - - - - - - - - - - - </option>';
                                    }
                                    echo '<option value="' . $x['c_id'] . '">Court ' . $x['c_number'] . '/' . $x['c_date_formatted'] . '/' . $x['ct_name'] . '/' . $x['c_bench'] . '-' . $x['bench_desc'] . '</option>';
                                }
                                echo '</select>
                                        <label for="floatingSelect3">CAUSE LIST</label>';
                                echo '</div></div>';
                                echo '<div class="col">
                                        <div class="d-flex justify-content-center">
                                        <input class="btn btn-primary" style="box-shadow: 1px 2px 2px #999999;" type="submit" name="selectCause" value="Select">
                                        </div></div>';
                            } else {
                                echo '<div class="d-flex justify-content-between">
                                        <div><a class="text-decoration-none fw-bold" href="main.php">REFRESH</a></div>
                                        <div class="fw-bold"> Court ' . $_SESSION['user_data']['causelist']['c_number'] . '</div>
                                        <div class="fw-bold"> Bench : ' . $_SESSION['user_data']['causelist']['c_bench'] . '-' . $_SESSION['user_data']['causelist']['bench_desc'] . '<span class="text-success"> (' . $_SESSION['user_data']['causelist']['ct_name'] . ')</span>
                                        </div>';
                                echo '<div>
                                            <input type="hidden" name="causeId" value="0">
                                            <input class="btn btn-sm btn-primary" style="box-shadow: 1px 2px 2px #999999;" type="submit" name="selectCause" value="Deselect">
                                        </div>';

                                echo "<div><input class=\"btn btn-sm btn-warning\" style=\"box-shadow: 1px 2px 2px #999999;\" type=\"submit\" name=\"callAll\" value=\"Call All\" onclick=\"return confirm('Call all cases ?');\">
                                        </div>";
                                echo "<div><input class=\"btn btn-sm btn-danger\" style=\"box-shadow: 1px 2px 2px #999999;\" type=\"submit\" name=\"completeAll\" value=\"Complete All\" onclick=\"return confirm('Complete all cases ?');\">
                                        </div>";
                                echo '</div>';
                            }
                        }
                        ?>
                    </div>
                </form>
            </div>
        </div>
        <br>
        <?php
        //pending list
        if (isset($_SESSION['user_data']['cause_list_status'])) {
            if ($_SESSION['user_data']['cause_list_status'] == true) {
                echo '<div class="card shadow-sm">
                    <div class="card-body">';
                echo '<div class="row text-center"><div class="col-2 fw-bold">Item No.</div><div class="col fw-bold">Case No.</div><div class="col fw-bold">Status</div>
                <div class="col fw-bold">Actions</div></div>';
                echo '<br>';
                if (isset($_SESSION['user_data']['cases'])) {
                    if (!empty($_SESSION['user_data']['cases'])) {
                        $flip = 'text-warning-emphasis';
                        foreach ($_SESSION['user_data']['cases'] as $c) {
                            if (strcmp($flip, 'text-warning-emphasis') == 0) {
                                $flip = 'text-primary-emphasis';
                            } else {
                                $flip = 'text-warning-emphasis';
                            }
                            if ($c['case_status'] != 4) {
                                if ($c['case_status'] == 3) {
                                    echo '<div class="row text-center ' . $flip . ' bg-secondary-subtle p-1">';
                                } else {
                                    echo '<div class="row text-center ' . $flip . '">';
                                }
                                echo '<div class="col-2">' . $c['case_sn'] . '</div><div class="col">' . $c['case_name'] . ' - ' . $c['case_regno'] . ' - ' . $c['case_year'] . ' ' . $c['case_remarks'] . '</div><div class="col">' . $c['s_status'] . '</div>';
                                echo '<div class="col g-1">';
                                echo '<form method="post" action="' . htmlspecialchars($_SERVER["PHP_SELF"]) . '">';
                                echo '<input type="hidden" name="caseItem" value="' . $c['case_sn'] . '"> ';
                                echo '<input class="btn btn-sm btn-primary" type="submit" name="caseCall" value="Called"> ';
                                echo '<input class="btn btn-sm btn-success" type="submit" name="caseInProgress" value="Progress"> ';
                                echo '<input class="btn btn-sm btn-warning" type="submit" name="caseCompleted" value="Completed"> ';
                                echo '&nbsp;';
                                printf("%02d", $c['case_sn']);
                                echo '</form>';
                                echo '</div>'; //last col
                                echo '</div>'; //close row
                            }
                        }
                    }
                }
                echo '</div>
                </div>';
            }
        }
        //completed list
        if (isset($_SESSION['user_data']['cause_list_status'])) {
            if ($_SESSION['user_data']['cause_list_status'] == true) {
                echo '<br><div class="row"><div class="col"><div class="fw-bold"> List of Cases Taken </div></div></div>';
                echo '<br><div class="card shadow-sm">
                    <div class="card-body">';
                echo '<div class="row text-center"><div class="col-2 fw-bold">Item No.</div><div class="col fw-bold">Case No.</div><div class="col fw-bold">Status</div>
                <div class="col fw-bold">Actions</div></div>';
                echo '<br>';
                if (isset($_SESSION['user_data']['cases'])) {
                    if (!empty($_SESSION['user_data']['cases'])) {
                        $flip = 'text-warning-emphasis';
                        foreach ($_SESSION['user_data']['cases'] as $c) {
                            if (strcmp($flip, 'text-warning-emphasis') == 0) {
                                $flip = 'text-primary-emphasis';
                            } else {
                                $flip = 'text-warning-emphasis';
                            }
                            if ($c['case_status'] == 4) {
                                echo '<div class="row text-center ' . $flip . '"><div class="col-2">' . $c['case_sn'] . '</div><div class="col">' . $c['case_name'] . ' - ' . $c['case_regno'] . ' - ' . $c['case_year'] . ' ' . $c['case_remarks'] . '</div><div class="col">' . $c['s_status'] . '</div>';
                                echo '<div class="col g-1">';
                                echo '<form method="post" action="' . htmlspecialchars($_SERVER["PHP_SELF"]) . '">';
                                echo '<input type="hidden" name="caseItem" value="' . $c['case_sn'] . '"> ';
                                echo '<input class="btn btn-sm btn-primary" type="submit" name="caseCall" value="Called"> ';
                                echo '<input class="btn btn-sm btn-success" type="submit" name="caseInProgress" value="Progress"> ';
                                echo '<input class="btn btn-sm btn-warning" type="submit" name="caseCompleted" value="Completed"> ';
                                printf("%02d", $c['case_sn']);
                                echo '</form>';
                                echo '</div>'; //last col
                                echo '</div>'; //close row
                            }
                        }
                    }
                }
                echo '</div>
                </div>';
            }
        }
        ?>
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