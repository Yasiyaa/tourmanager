
    <?php

    $username = $_POST["username"];
    $password = $_POST["password"];

    include '../../config/dbConfig.php';

    $query = "select * from users where username = '$username' and password = '$password'";
    $status = $link->query($query);

    if (isset($_POST["username"])) {
        if ($status->num_rows > 0) {
            header("Location: ../index.php ");
        } else {
            header("Location: ../login.php?error=1 ");
        }
    }

    $link->close();


    ?>