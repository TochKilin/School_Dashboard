<?php
header('Content-Type: application/json; charset=utf-8');

$cn = new mysqli("localhost","root","","shcool");
$cn->set_charset("utf8");

$editId   = $_POST['txt-edit-id'];
$id       = $_POST['txt-id'];
$name     = trim($_POST['txt-name']);
$gender   = $_POST['txt-gender'];
$worktime = $_POST['txt-work-time'];
$salary   = $_POST['txt-salary'];
$skill    = $_POST['txt-skill'];
$workdate = $_POST['txt-work-date'];
$telegram = trim($_POST['txt-telegram']);

$msg = ['editdpl'=>false, 'edit'=>false];

// Check duplicate
$sql = "SELECT * FROM tbl_cher WHERE Name = '$name' AND id != $id";
$res = $cn->query($sql);

if($res && $res->num_rows == 0) {
    if($editId == '0'){
        $sql = "INSERT INTO tbl_cher (name, gender, worktime, salary, skill, Date, telegram)
                VALUES('$name','$gender','$worktime','$salary','$skill','$workdate','$telegram')";
        if($cn->query($sql)){
            $msg['id'] = $cn->insert_id;
        } else {
            $msg['error'] = $cn->error;
        }
    } else {
        $sql = "UPDATE tbl_cher 
                SET name='$name', gender='$gender', worktime='$worktime', salary='$salary', skill='$skill', `Date`='$workdate', telegram='$telegram'
                WHERE id = $id";
        if($cn->query($sql)){
            $msg['editdpl'] = true;
        } else {
            $msg['error'] = $cn->error;
        }
    }
} else {
    $msg['edit'] = true;
}

echo json_encode($msg);
?>
