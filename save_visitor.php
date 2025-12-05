<?php
include "db.php";

$name   = $_POST['visitor_name'];
$date   = $_POST['date_of_visit'];
$time   = $_POST['time_of_visit'];
$addr   = $_POST['address'];
$contact= $_POST['contact'];
$school = $_POST['school_office'];
$purpose= $_POST['purpose'];

$sql = "INSERT INTO visitors (visitor_name, date_of_visit, time_of_visit, address, contact, school_office, purpose)
        VALUES ('$name', '$date', '$time', '$addr', '$contact', '$school', '$purpose')";

mysqli_query($conn, $sql);

header("Location: dashboard.php");
?>
