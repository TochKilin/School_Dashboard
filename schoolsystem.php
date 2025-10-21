<?php
session_start();

$cn = new mysqli("localhost", "root", "", "shcool");

if ($cn->connect_error) {
    die("Connection failed: " . $cn->connect_error);
}

$error = '';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = trim($_POST['username'] ?? '');
    $password = $_POST['password'] ?? '';

    if ($username === "" || $password === '') {
        $error = "សូមបំពេញឈ្មោះ និងពាក្យសម្ងាត់";
    } else {
        $stmt = $cn->prepare("SELECT id, password FROM users WHERE username = ? LIMIT 1");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result && $result->num_rows === 1) {
            $row = $result->fetch_assoc();

            if (md5($password) === $row['password']) {
                $_SESSION['user_id'] = $row['id'];
                $_SESSION['username'] = $username;
                header("Location: index.php");
                exit;
            } else {
                $error = "ពាក្យសម្ងាត់មិនត្រឹមត្រូវទេ";
            }
        } else {
            $error = "ឈ្មោះអ្នកប្រើមិនត្រឹមត្រូវទេ";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="km">
<head>
    <meta charset="UTF-8">
    <title>ចូលប្រើប្រព័ន្ធ</title>
    <link rel="icon" type="image/jpg" href="logo/logo-1.jpg">
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background: #eee;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .login-box {
            background: rgba(255, 255, 255, 0.95);
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.2);
            width: 420px;
            height: 350px;
            animation: fadeIn 0.8s ease-in-out;
        }
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        h2 {
            text-align: center;
            color: #333;
            margin-bottom: 25px;
        }
        input {
            width: 92%;
            padding: 12px;
            margin: 8px 0 15px 0;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 14px;
        }
        input:focus {
            border-color: #2575fc;
            box-shadow: 0 0 8px rgba(37, 117, 252, 0.3);
            outline: none;
        }
        button {
            width: 100%;
            padding: 12px;
            background: #2575fc;
            color: white;
            font-size: 16px;
            font-weight: bold;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            transition: 0.3s;
        }
        button:hover {
            background: #1a5ed0;
        }
        .error {
            color: red;
            text-align: center;
            margin-bottom: 10px;
            font-size: 14px;
        }
        .link {
            text-align: center;
            margin-top: 10px;
        }
        .link a {
            color: #2575fc;
            text-decoration: none;
        }
        .link a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="login-box">
        <h2>ចូលប្រើប្រព័ន្ធ</h2>
        <?php if (!empty($error)): ?>
            <div class="error"><?= htmlspecialchars($error) ?></div>
        <?php endif; ?>

        <form method="post" action="">
            <input type="text" name="username" placeholder="ឈ្មោះអ្នកប្រើ" required>
            <input type="password" name="password" placeholder="ពាក្យសម្ងាត់" required>
            <button type="submit">ចូលប្រើ</button>
        </form>

        <div class="link">
            មិនទាន់មានគណនីទេ? <a href="register.php">ចុះឈ្មោះថ្មី</a>
        </div>
    </div>
</body>
</html>
