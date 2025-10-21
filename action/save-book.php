<?php
$cn = new mysqli("localhost", "root", "", "shcool");
$cn->set_charset("utf8");

$title = $_POST['title'];
$author = $_POST['author'];
$category = $_POST['category'];
$year = $_POST['year'];
$isbn = $_POST['isbn'];

$sql = "INSERT INTO books (title, author, category, year, isbn) 
        VALUES ('$title', '$author', '$category', '$year', '$isbn')";

if ($cn->query($sql)) {
    $countRes = $cn->query("SELECT COUNT(*) AS total FROM books");
    $countRow = $countRes->fetch_assoc();
    $rowNumber = $countRow['total'];

    echo json_encode([
        'success' => true,
        'rowNumber' => $rowNumber,
        'title' => $title,
        'author' => $author,
        'category' => $category,
        'year' => $year,
        'isbn' => $isbn
    ]);
} else {
    echo json_encode(['success' => false]);
}
?>
