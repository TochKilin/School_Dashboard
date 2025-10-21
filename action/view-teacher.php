<?php
$cn = new mysqli("localhost", "root", "", "shcool");
$cn->set_charset("utf8");

$id = $_POST['id']; 
$sql = "SELECT * FROM tbl_cher WHERE id = $id";
$res = $cn->query($sql);

if ($res && $res->num_rows > 0) {
    $row = $res->fetch_assoc();
    echo json_encode([
        'success' => true,
        'data' => [
            'id' => $row['id'],
            'name' => $row['name'],
            'gender' => $row['gender'],
            'worktime' => $row['worktime'],
            'salary' => $row['salary'],
            'skill' => $row['skill'],
            'Date' => $row['Date'],
            'telegram' => $row['telegram'],
            
        ]
    ]);
} else {
    echo json_encode(['success' => false]);
}
?>
