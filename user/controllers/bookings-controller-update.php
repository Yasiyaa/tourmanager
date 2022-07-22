<?php

include '../../config/dbConfig.php';

$id = $_GET['id'];

$destination = $_POST["destination"];
$location = $_POST["location"];
$checkInDate = $_POST["checkInDate"];
$checkOutDate = $_POST["checkOutDate"];
$duration = $_POST["duration"];
$membersCount = $_POST["membersCount"];


$query = "UPDATE `booking` 
SET `destination`= '$destination' ,`location`= '$location' ,`checkInDate`= '$checkInDate',
`checkOutDate`= '$checkOutDate' ,`duration`= $duration ,`memberCount`= $membersCount WHERE id = $id";

var_dump($query);

$status = $link->query($query);

if ($status) {
    header("Location: ../booking.php?up-status=1 ");
} else {
    header("Location: ../booking.php?up-status=0 ");
}

$link->close();

?>
