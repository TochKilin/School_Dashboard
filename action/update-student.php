<?php
$cn = new mysqli("localhost", "root", "", "shcool");
$cn->set_charset("utf8");

$id = $_POST['id'];
$name = $_POST['name'];
$gender = $_POST['gender'];
$dob = $_POST['dob'];
$email = $_POST['email'];

$sql = "UPDATE schoolsm SET Name='$name', Gender='$gender', DBO='$dob', Email='$email' WHERE id=$id";

if ($cn->query($sql)) {
    echo "success";
} else {
    echo "fail";
}
?>
