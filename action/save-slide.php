
<?php
 $cn = new mysqli("localhost","root","","shcool");
 $cn->set_charset("utf8");

 $editId = $_POST['txt-edit-id'];
 $id = $_POST['txt-id'];
 $name = trim($_POST['txt-name']);
 $gender = $_POST['txt-gender'];
 $dbo = $_POST['txt-dob'];
 $email = trim($_POST['txt-email']);

 //check dublicate data or name
 $sql = "SELECT * FROM  schoolsm  WHERE Name = '$name' AND id != $id ";
 $res = $cn->query($sql);
 $num = $res->num_rows;
 $msg['editdpl']=false;
 if($num == 0){
   
   if($editId == '0'){
     
    $sql = "INSERT INTO schoolsm VALUES(null,'$name','$gender','$dbo','$email')";
    $cn->query($sql);
    $msg['id'] = $cn->insert_id; 
   
   }else{
      $sql = "UPDATE schoolsm SET Name='$name',Gender='$gender',DBO='$dbo',Email='$email'  where id = $id";
      $cn->query($sql);
      $msg['editdpl']=true;

   }
     $msg['edit'] = false;

 }else{
    $msg['edit'] =true;
 }

 
 echo json_encode($msg);

 

?>


