<?php

include '../../config/dbConfig.php';

$id = $_GET['id'];

$query = "UPDATE `booking` 
SET `id`=[value-1],`destination`=[value-2],`location`=[value-3],`checkInDate`=[value-4],
`checkOutDate`=[value-5],`duration`=[value-6],`memberCount`=[value-7] WHERE id = $id";
$status = $link->query($query);

if ($status) {
    header("Location: ../booking.php?status=1 ");
} else {
    header("Location: ../booking.php?status=0 ");
}


$link->close();

?>
