<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title></title>
</head>

<body>

    <?php

    $email = $_POST["email"];
    $password = $_POST["password"];


    include '../../config/dbConfig.php';

    $query = "INSERT INTO `users` (`username`, `password`) VALUES ('$email', '$password')";
    $status = $link->query($query);

    if ($status) {
        echo "<script>
        Swal.fire(
            'Good job!',
            'You clicked the button!',
            'success'
        )
    </script>";
    } else {
        echo "<br><br>Error-Insert record";
    }
    $link->close();

    ?>

</body>

</html>