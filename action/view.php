<?php
$cn = new mysqli("localhost", "root", "", "shcool");
$cn->set_charset("utf8");

$id = $_POST['id']; 

$sql = "SELECT * FROM schoolsm WHERE id = $id";
$res = $cn->query($sql);

if ($res && $res->num_rows > 0) {
    $row = $res->fetch_assoc();
    echo json_encode([
        'success' => true,
        'data' => [
            'id' => $row['id'],
            'name' => $row['Name'],
            'gender' => $row['Gender'],
            'dob' => $row['DBO'],
            'email' => $row['Email']
        ]
    ]);
} else {
    echo json_encode(['success' => false]);
}
?>
