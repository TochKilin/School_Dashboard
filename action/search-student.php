<?php
$cn = new mysqli("localhost", "root", "", "shcool");
$cn->set_charset("utf8");

$search = $_POST['search'] ?? '';
$search = $cn->real_escape_string($search);

$sql = "SELECT * FROM  schoolsm 
        WHERE id LIKE '%$search%' 
        OR Name LIKE '%$search%' 
        OR Gender LIKE '%$search%' 
        OR DBO LIKE '%$search%' 
        OR Email LIKE '%$search%'";


$res = $cn->query($sql);
$i = 1;

if ($res && $res->num_rows > 0) {
  while ($row = $res->fetch_assoc()) {
    echo "<tr>";
    echo "<td align='center'>" . $row['id'] . "</td>";
    echo "<td>" . htmlspecialchars($row['Name']) . "</td>";
    echo "<td align='center'>" . htmlspecialchars($row['Gender']) . "</td>";
    echo "<td align='center'>" . htmlspecialchars($row['DBO']) . "</td>";
    echo "<td align='center'>$" . htmlspecialchars($row['Email']) . "</td>";
    
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
