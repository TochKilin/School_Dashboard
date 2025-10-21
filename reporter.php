  <?php
  
   include('action/countData.php');
  
  ?>

<!DOCTYPE html>
<html lang="km">
<head>
  <meta charset="UTF-8">
  <title>Dashboard</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
  <style>
    .card { margin-bottom: 20px; }
    .dashboard-title { text-align: center; margin: 20px 0; font-family: 'Khmer OS Battambang'; }
  </style>
</head>
<body>

<div class="container">
  <h2 class="dashboard-title">ផ្ទាំងព័ត៌មានសង្ខេប</h2>
  <div class="row">

    <div class="col-md-3">
      <div class="card text-white bg-primary">
        <div class="card-body">
          <h5 class="card-title">សិស្សសរុប</h5>
          <p class="card-text fs-3"><?= $total_students ?></p>
        </div>
      </div>
    </div>

    <div class="col-md-3">
      <div class="card text-white bg-success">
        <div class="card-body">
          <h5 class="card-title">សិស្សប្រុស</h5>
          <p class="card-text fs-3"><?= $male_students ?></p>
        </div>
      </div>
    </div>

    <div class="col-md-3">
      <div class="card text-white bg-warning">
        <div class="card-body">
          <h5 class="card-title">សិស្សស្រី</h5>
          <p class="card-text fs-3"><?= $female_students ?></p>
        </div>
      </div>
    </div>

    <div class="col-md-3">
      <div class="card text-white bg-danger">
        <div class="card-body">
          <h5 class="card-title">គ្រូសរុប</h5>
          <p class="card-text fs-3"><?= $total_teachers ?></p>
        </div>
      </div>
    </div>

  </div>
</div>

</body>
</html>