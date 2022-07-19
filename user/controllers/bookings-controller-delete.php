<?php

include '../../config/dbConfig.php';

$id = $_GET['id'];

$query = "DELETE FROM `booking` WHERE id = $id";
$status = $link->query($query);

if ($status) {
    header("Location: ../booking.php?status=1 ");
} else {
    header("Location: ../booking.php?status=0 ");
}


$link->close();

?>
