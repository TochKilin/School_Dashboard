<?php
$cn = new mysqli("localhost", "root", "", "shcool");
$cn->set_charset("utf8");

$search = $_POST['search'] ?? '';
$search = $cn->real_escape_string($search);

$sql = "SELECT * FROM tbl_cher 
        WHERE id LIKE '%$search%' 
        OR name LIKE '%$search%' 
        OR gender LIKE '%$search%' 
        OR worktime LIKE '%$search%' 
        OR salary LIKE '%$search%' 
        OR skill LIKE '%$search%' 
        OR Date LIKE '%$search%' 
        OR telegram LIKE '%$search%'";

$res = $cn->query($sql);
$i = 1;

if ($res && $res->num_rows > 0) {
  while ($row = $res->fetch_assoc()) {
    echo "<tr>";
    echo "<td align='center'>" . $row['id'] . "</td>";
    echo "<td>" . htmlspecialchars($row['name']) . "</td>";
    echo "<td align='center'>" . htmlspecialchars($row['gender']) . "</td>";
    echo "<td align='center'>" . htmlspecialchars($row['worktime']) . "</td>";
    echo "<td align='center'>$" . htmlspecialchars($row['salary']) . "</td>";
    echo "<td>" . htmlspecialchars($row['skill']) . "</td>";
    echo "<td>" . htmlspecialchars($row['Date']) . "</td>";
    echo "<td align='center'>" . htmlspecialchars($row['telegram']) . "</td>";
    echo "<td align='center'>
            <button type='button' class='btn-view' data-id='" . $row['id'] . "' style='border:none;border-radius:8px;color:blue;padding:8px;margin-left:15px;'> 
              <i class='fa-solid fa-eye'></i>
            </button>
            <button type='button' class='btn-edit' style='border:none;border-radius:8px;color:blue;padding:8px;margin-left:15px'> 
              <i class='fa-solid fa-user-pen'></i>
            </button>
            <button type='button' class='btn-delete' data-id='" . $row['id'] . "' style='border:none;border-radius:8px;color:red;margin-left:15px;padding:8px'> 
              <i class='fa-solid fa-trash'></i>
            </button>
          </td>";
    echo "</tr>";
  }
} else {
  echo "<tr><td colspan='9'>មិនមានទិន្នន័យ!</td></tr>";
}
?>
