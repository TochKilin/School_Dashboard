<?php
$cn = new mysqli("localhost", "root", "", "shcool");
$cn->set_charset("utf8");

$search = $_POST['search'] ?? '';
$search = $cn->real_escape_string($search);

$sql = "SELECT * FROM books 
        WHERE title LIKE '%$search%' 
        OR author LIKE '%$search%' 
        OR category LIKE '%$search%' 
        OR year LIKE '%$search%' 
        OR isbn LIKE '%$search%'";

$res = $cn->query($sql);
$i = 1;

if ($res && $res->num_rows > 0) {
  while ($row = $res->fetch_assoc()) {
    echo "<tr>";
    echo "<td>" . $i++ . "</td>";
    echo "<td>" . htmlspecialchars($row['title']) . "</td>";
    echo "<td>" . htmlspecialchars($row['author']) . "</td>";
    echo "<td>" . htmlspecialchars($row['category']) . "</td>";
    echo "<td>" . htmlspecialchars($row['year']) . "</td>";
    echo "<td>" . htmlspecialchars($row['isbn']) . "</td>";
    echo "</tr>";
  }
} else {
  echo "<tr><td colspan='6'>មិនមានទិន្នន័យសម!</td></tr>";
}
?>
