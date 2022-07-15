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

    $destination = $_POST["destination"];
    $location = $_POST["location"];
    $checkInDate = $_POST["checkInDate"];
    $checkOutDate = $_POST["checkOutDate"];
    $duration = $_POST["duration"];
    $membersCount = $_POST["membersCount"];

    


    include '../../config/dbConfig.php';

    $query = "insert into tourinfo values ('$tid','$tname','$pr')";
    $status = $link->query($query);

    if ($status) {
        echo `    <script>
        Swal.fire(
            'Good job!',
            'You clicked the button!',
            'success'
        )
    </script>`;
    } else {
        echo "<br><br>Error-Insert record";
    }
    $link->close();


    ?>



</body>

</html>