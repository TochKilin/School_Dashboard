<?php
$conn = new mysqli("localhost", "root", "", "shcool");

// សិស្សសរុប
$q1 = $conn->query("SELECT COUNT(*) AS total_students FROM schoolsm");
$total_students = $q1->fetch_assoc()['total_students'];

// សិស្សប្រុស
$q2 = $conn->query("SELECT COUNT(*) AS male_students FROM schoolsm WHERE gender = 'ប្រុស'");
$male_students = $q2->fetch_assoc()['male_students'];

// សិស្សស្រី
$q3 = $conn->query("SELECT COUNT(*) AS female_students FROM schoolsm WHERE gender = 'ស្រី'");
$female_students = $q3->fetch_assoc()['female_students'];

// គ្រូសរុប
$q4 = $conn->query("SELECT COUNT(*) AS total_teachers FROM tbl_cher");
$total_teachers = $q4->fetch_assoc()['total_teachers'];
?>