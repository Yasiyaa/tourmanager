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
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
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

                        <a class="nav-link" href="index.html">
                            <div class="sb-nav-link-icon"><i class="fas fa-book"></i></div>
                            Bookings
                        </a>
                        <a class="nav-link" href="destinations.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-mountain"></i></div>
                            Destinations
                        </a>

                        
            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main>


                <?php
                if (isset($_GET["status"]) && $_GET["status"] == 1 ) {
                    echo "<script>
                    Swal.fire(
                        'Booking removed successfully!',
                        'sucess!',
                        'success'
                    )
                </script>";
                }
                ?>


                <div class="container">
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table me-1"></i>
                            Manage tours
                        </div>
                        <div class="card-body">
                            <table id="datatablesSimple">
                                <thead>
                                    <tr>
                                        <th>tour id</th>
                                        <th>destination</th>
                                        <th>location</th>
                                        <th>check in date</th>
                                        <th>check out date</th>
                                        <th>duration</th>
                                        <th>members</th>
                                        <th>actions</th>
                                    </tr>
                                </thead>

                                <tbody>

                                    <?php
                                    include '../config/dbConfig.php';

                                    $query = "SELECT * FROM `booking`";
                                    $result = $link->query($query);
                                    //$row = $result->fetch_array(MYSQLI_ASSOC);

                                    //var_dump($row);


                                    ?>

                                    <?php foreach ($result as $item) { ?> 
                                        <tr>
                                            <td><?php echo $item["id"];  ?></td>
                                            <td><?php echo $item['destination']; ?></td>
                                            <td><?php echo $item['location'];  ?></td>
                                            <td><?php echo $item['checkInDate']; ?></td>
                                            <td><?php echo $item['checkOutDate'];  ?></td>
                                            <td><?php echo $item['duration'];  ?></td>
                                            <td><?php echo $item['memberCount']; ?></td>

                                            <td>
                                                <button class="btn btn-info"> <a style="text-decoration:none;color:white;" href="./controllers/bookings-controller-update.php?id=<?php echo $item['id']; ?>"> <i class="fas fa-edit"></i> Edit </a></button>
                                                <button class="btn btn-danger"> <a style="text-decoration:none;color:white;" href="./controllers/bookings-controller-delete.php?id=<?php echo $item['id']; ?>"> <i class="fas fa-trash"></i> Delete</a></button>
                                            </td>
                                        </tr>

                                    <?php } ?>


                                </tbody>
                            </table>
                        </div>
                    </div>
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
        // function confirmDelete(id) {
        //     Swal.fire({
        //         title: 'Are you sure?',
        //         text: "You won't be able to revert this!",
        //         icon: 'warning',
        //         showCancelButton: true,
        //         confirmButtonColor: '#3085d6',
        //         cancelButtonColor: '#d33',
        //         confirmButtonText: 'Yes, delete it!'
        //     }).then((result) => {
        //         if (result.isConfirmed) {
        //             <?php
                        //             header("Location: ./controllers/bookings-controller-delete.php?id=" echo  );
                        //             
                        ?>

        //         }
        //     })
        // }
    </script>
</body>

</html>