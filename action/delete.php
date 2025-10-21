<?php
$cn = new mysqli("localhost", "root", "", "shcool");
$cn->set_charset("utf8");

if (isset($_POST['id'])) {
    $id = intval($_POST['id']);

    $sql = "DELETE FROM schoolsm WHERE id = $id";
    if ($cn->query($sql)) {
        echo "deleted";
    } else {
        echo "error"; 
    }
} else {
    echo "no_id"; 
}
?>