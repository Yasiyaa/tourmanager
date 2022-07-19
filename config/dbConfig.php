<?php 

$link=mysqli_connect("localhost","root","","tourmangement");
if ($link->connect_error) {
die("Connection failed: " . $link->connect_error);
}
echo "";

?>