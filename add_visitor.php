<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Add Visitor</title>
</head>
<body>

<h2>New Visitor</h2>

<form action="save_visitor.php" method="POST">

Name:<br>
<input type="text" name="visitor_name" required><br><br>

Date of Visit:<br>
<input type="date" name="date_of_visit" required><br><br>

Time of Visit:<br>
<input type="time" name="time_of_visit" required><br><br>

Address:<br>
<input type="text" name="address" required><br><br>

Contact:<br>
<input type="text" name="contact" required><br><br>

School/Office Name:<br>
<input type="text" name="school_office" required><br><br>

Purpose:<br>
<select name="purpose">
    <option value="inquiry">Inquiry</option>
    <option value="exam">Exam</option>
    <option value="visit">Visit</option>
</select><br><br>

<button type="submit">Save</button>

</form>

</body>
</html>
