<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Dashboard - SB Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3" href="index.html">Tour Manager</a>
        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
        <!-- Navbar Search-->
        <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
            <div class="input-group">
                <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
            </div>
        </form>
        <!-- Navbar-->
        <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="#!">Settings</a></li>
                    <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                    <li>
                        <hr class="dropdown-divider" />
                    </li>
                    <li><a class="dropdown-item" href="login.php">Logout</a></li>
                </ul>
            </li>
        </ul>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading">Welcome to tour manager</div>
                        <a class="nav-link" href="index.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Dashboard
                        </a>
                        <a class="nav-link" href="booknow.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-clock"></i></div>
                            Book now
                        </a>

                        <a class="nav-link" href="booking.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-book"></i></div>
                            Bookings
                        </a>
                        <a class="nav-link" href="index.html">
                            <div class="sb-nav-link-icon"><i class="fas fa-mountain"></i></div>
                            Destinations
                        </a>


            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main>
                <?php

                include '../config/dbConfig.php';

                $id = $_GET['id'];
                $query = "select * from booking where id='$id'";
                $result = $link->query($query);
                $row = $result->fetch_array(MYSQLI_ASSOC);
                $link->close();


                ?>

                <div class="container">

                    <form class="row g-3" action="./controllers/bookings-controller-update.php?id=<?php echo $id; ?>" method="POST" id="detailsForm">
                        <div class="col-md-6">
                            <label for="inputEmail4" class="form-label">Destination</label>
                            <select class="form-control" name="destination" id="destination">
                                <option value="turkey" <?= $row['destination'] == 'turkey' ? ' selected="selected"' : ''; ?>>turkey</option>
                                <option value="russia" <?= $row['destination'] == 'russia' ? ' selected="selected"' : ''; ?>>russia</option>
                                <option value="egypt" <?= $row['destination'] == 'egypt' ? ' selected="selected"' : ''; ?>>egypt</option>
                            </select><!-- /.select-->
                        </div>
                        <div class="col-md-6">
                            <label for="inputPassword4" class="form-label">Location</label>
                            <select class="form-control " name="location" id="location">

                                <option value="istanbul" <?= $row['location'] == 'istanbul' ? ' selected="selected"' : ''; ?>>istanbul</option>
                                <option value="moscow" <?= $row['location'] == 'moscow' ? ' selected="selected"' : ''; ?>>moscow</option>
                                <option value="cairo" <?= $row['location'] == 'cairo' ? ' selected="selected"' : ''; ?>>cairo</option>

                            </select><!-- /.select-->
                        </div>
                        <div class="col-4">
                            <label for="inputAddress" class="form-label">Check in date</label>
                            <input type="date" class="form-control" id="checkInDate" name="checkInDate" value=<?php echo $row['checkInDate'] ?>>
                        </div>
                        <div class="col-4">
                            <label for="inputAddress2" class="form-label">Check out date</label>
                            <input type="date" class="form-control" id="checkOutDate" name="checkOutDate" value=<?php echo $row['checkOutDate'] ?>>
                        </div>
                        <div class="col-md-3">
                            <label for="inputCity" class="form-label">Duration</label>
                            <input type="number" class="form-control" id="duration" name="duration" min="1" max="30" value=<?php echo $row['duration'] ?>>
                        </div>
                        <div class="col-md-4">
                            <label for="inputState" class="form-label">Members</label>
                            <input type="number" class="form-control" id="members" name="membersCount" min="1" max="10" value=<?php echo $row['memberCount'] ?>>
                        </div>


                        <div class="col-12">
                            <button type="button" onclick="submitForm()" class="btn btn-primary">Update</button>
                        </div>
                    </form>

                </div>

            </main>
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; Your Website 2022</div>
                        <div>
                            <a href="#">Privacy Policy</a>
                            &middot;
                            <a href="#">Terms &amp; Conditions</a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/chart-area-demo.js"></script>
    <script src="assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
    <script src="js/datatables-simple-demo.js"></script>


    <script>
        function submitForm() {

            const form = document.getElementById('detailsForm');
            var destination = document.getElementById('destination').value;
            var location = document.getElementById('location').value;
            var checkInDate = document.getElementById('checkInDate').value;
            var checkOutDate = document.getElementById('checkOutDate').value;
            var duration = document.getElementById('duration').value;
            var members = document.getElementById('members').value;

            if (destination == 0) {
                alert("Enter your destination country");

            } else if (location == 0) {
                alert("Enter your destination location");
            } else if (checkInDate == '') {
                alert("Enter check in date");
            } else if (checkOutDate == '') {
                alert("Enter check out date");

            } else if (duration == '') {
                alert("Enter your staying duration");

            } else if (members == '') {
                alert("Enter how many members you have in your tour ");
            } else {
                form.submit();
            }

        }
    </script>
</body>

</html>