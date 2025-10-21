<?php
$cn = new mysqli("localhost", "root", "", "shcool");
$cn->set_charset("utf8");

if (isset($_POST['id'])) {
    $id = intval($_POST['id']);
    
    $check = $cn->query("SELECT * FROM tbl_cher WHERE id = $id");
    if ($check->num_rows == 0) {
        echo "ID $id does not exist!";
        exit;
    }

    $sql = "DELETE FROM tbl_cher WHERE id = $id";
    if ($cn->query($sql)) {
        echo "deleted";
    } else {
        echo "error: " . $cn->error;
    }
} else {
    echo "no_id";
}
?>
