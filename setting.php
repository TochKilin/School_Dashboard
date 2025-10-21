<?php
session_start();
$cn = new mysqli("localhost", "root", "", "shcool");

if (!isset($_SESSION['user_id'])) {
    echo "<script>
        alert('សូមចូលប្រើជាមុនសិន!');
        window.location.href = 'schoolsystem.php';
    </script>";
    exit;
}

$username = $_SESSION['username'];
$message = "";
$type = "";
$title = "";
?>

<!DOCTYPE html>
<html lang="km">
<head>
  <meta charset="UTF-8">
  <title>ការកំណត់គណនី</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body class="bg-light">

<div class="container mt-5">
  <div class="card shadow-lg border-0 rounded-4" style="max-width: 500px; margin:auto;">
    <div class="card-header bg-primary text-white text-center fs-5 fw-bold py-3">
       ការកំណត់គណនី
    </div>
    <div class="card-body p-4">
      <form method="POST">
        <div class="mb-3">
          <label class="form-label fw-semibold">ពាក្យសម្ងាត់ចាស់</label>
          <input type="password" name="old_pass" class="form-control" required>
        </div>
        <div class="mb-3">
          <label class="form-label fw-semibold">ពាក្យសម្ងាត់ថ្មី</label>
          <input type="password" name="new_pass" class="form-control" required>
        </div>
        <div class="mb-3">
          <label class="form-label fw-semibold">បញ្ជាក់ពាក្យសម្ងាត់ថ្មី</label>
          <input type="password" name="confirm_pass" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary w-100 fw-semibold">ប្តូរពាក្យសម្ងាត់</button>
      </form>
    </div>
  </div>
</div>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $old_pass = md5($_POST['old_pass']);
    $new_pass = md5($_POST['new_pass']);
    $confirm_pass = md5($_POST['confirm_pass']);

    // ពិនិត្យពាក្យសម្ងាត់ចាស់
    $sql = "SELECT password FROM users WHERE username=?";
    $stmt = $cn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    if ($user && $user['password'] === $old_pass) {
        if ($new_pass === $confirm_pass) {
            $update = $cn->prepare("UPDATE users SET password=? WHERE username=?");
            $update->bind_param("ss", $new_pass, $username);
            $update->execute();

            $type = "success";
            $title = "ប្តូរពាក្យសម្ងាត់បានជោគជ័យ!";
        } else {
            $type = "error";
            $title = "ពាក្យសម្ងាត់ថ្មីមិនដូចគ្នាទេ!";
        }
    } else {
        $type = "error";
        $title = "ពាក្យសម្ងាត់ចាស់មិនត្រឹមត្រូវ!";
    }

    echo "<script>
        Swal.fire({
            icon: '$type',
            title: '$title',
            showConfirmButton: false,
            timer: 2000
        });
    </script>";
}
?>

</body>
</html>
