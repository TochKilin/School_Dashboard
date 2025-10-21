<?php 
session_start();
$cn = new mysqli("localhost","root","","shcool");
$username = isset($_SESSION['username']) ? $_SESSION['username'] : 'Guest';
$id = 1;
$sql = "SELECT id FROM schoolsm ORDER BY id DESC";
$res = $cn->query($sql);
if ($res && $res->num_rows > 0) {
    $row = $res->fetch_array();
    $id = $row[0] + 1;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>School Dashboard</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="icon" type="image/jpg" href="logo/logo-1.jpg">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://kit.fontawesome.com/228abf6277.js" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <link rel="stylesheet" href="style.css">
</head>
<body>
   
  <!-- Sidebar -->
  <div class="sidebar">
    <h4>សាលារៀន</h4>
    <a href="#" data-opt="0"><i class="fa-solid fa-list"></i> បញ្ជីឈ្មោះគ្រូ</a>
    <a href="#" data-opt="1"><i class="fa-solid fa-list"></i> បញ្ជីឈ្មោះសិស្ស</a>
    <a href="#" data-opt="2"><i class="fa-solid fa-chart-simple"></i> តារាងទិន្ន័យ</a>
    <a href="#" data-opt="3"><i class="fa-solid fa-book"></i> ស្តុកសៀវភៅ</a>
    <a href="#" data-opt="4"><i class="fa-solid fa-gear"></i> ការកំណត់</a>
  </div>

  <!-- Main content -->
  <div class="main">
    <!-- Topbar -->
    <div class="topbar d-flex justify-content-between align-items-center p-3 bg-light shadow-sm">
      <h4 class="m-0">សាលាបច្ចេកវិទ្យា</h4>
      <div class="d-flex align-items-center gap-3">
        <span>👤 <?php echo htmlspecialchars($username); ?></span>
        <!-- ✅ Logout Button -->
        <a href="logout.php" class="btn btn-danger btn-sm">
          <i class="fa-solid fa-right-from-bracket"></i> ចាកចេញ
        </a>
      </div>
    </div>
    
    <!-- Content Container -->
    <div id="form-container">
      <?php include("teacher.php"); ?> 
    </div>
  </div>

  <!-- jQuery Script -->
  <script>
  $(document).ready(function () {
    $('.sidebar').on('click', 'a', function(){
      var frmInd = $(this).data('opt');
      if (frmInd == 0) {
        $('#form-container').load('teacher.php');
      } else if (frmInd == 1) {
        $('#form-container').load('student.php');
      } else if (frmInd == 2) {
        $('#form-container').load('reporter.php');
      } else if (frmInd == 3) {
        $('#form-container').load('Bookstore.php');
      } else if (frmInd == 4) {
        $('#form-container').load('setting.php');
      }
    });
  });
  </script>

</body>
</html>
