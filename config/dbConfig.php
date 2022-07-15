<?php 

$link=mysqli_connect("localhost","root","","tours");
if ($link->connect_error) {
die("Connection failed: " . $link->connect_error);
}
echo "Connection OK";

?>