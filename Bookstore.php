<?php
$cn = new mysqli("localhost", "root", "", "shcool");
$cn->set_charset("utf8");
$res = $cn->query("SELECT * FROM books");
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Book Registration</title>
  <style>
    body {
      font-family: Arial;
      background: #f2f2f2;
      padding: 30px;
    }
    form {
      background: #fff;
      padding: 20px;
      max-width: 700px;
      margin: auto;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0,0,0,0.2);
    }
    input, select {
      width: 100%;
      padding: 10px;
      margin: 8px 0;
    }
    button {
      width: 100%;
      padding: 10px;
      background-color: #28a745;
      color: white;
      border: none;
      margin-top: 10px;
    }
    table {
      border-collapse: collapse;
      width: 100%;
      background: white;
      
    }
    th, td {
      border: 1px solid #ddd;
      padding: 8px;
      text-align: center;
    }
    th {
      background-color: #007BFF;
      color: white;
    }
    tr:hover {
      background-color: #f1f1f1;
    }
    h2 {
      /* text-align: center; */
      margin-bottom: 20px;
    }
  </style>
</head>
<body>
    <input type="text" id="searchInput" placeholder="🔍 ស្វែងរកសៀវភៅ..." style="width: 100%; padding: 10px; margin: 20px 0;border-radius: 8px;border: 1px solid grey;outline: none;">

  <form id="bookForm">
  <h2>បញ្ចូលសៀវភៅ</h2>
  <label>ចំណងជើងសៀវភៅ</label>
  <input type="text" name="title" required>

  <label>អ្នកនិពន្ធ</label>
  <input type="text" name="author" required>

  <label>ប្រភេទ</label>
  <select name="category" required>
    <option value="">-- ជ្រើសរើស --</option>
    <option value="អក្សរសាស្ត្រ">អក្សរសាស្ត្រ</option>
    <option value="វិទ្យាសាស្ត្រ">វិទ្យាសាស្ត្រ</option>
    <option value="ប្រវត្តិសាស្ត្រ">ប្រវត្តិសាស្ត្រ</option>
    <option value="អាជីវកម្ម">អាជីវកម្ម</option>
  </select>

  <label>ឆ្នាំបោះពុម្ព</label>
  <input type="number" name="year" required>

  <label>លេខសៀវភៅ (ISBN)</label>
  <input type="text" name="isbn" required>

  <button type="submit">រក្សាទុក</button>
</form>
<h2>បញ្ជីសៀវភៅ</h2>
 

<table id="booksTable">
  <thead>
    <tr>
      <th>ល.រ</th>
      <th>ចំណងជើងសៀវភៅ</th>
      <th>អ្នកនិពន្ធ</th>
      <th>ប្រភេទ</th>
      <th>ឆ្នាំបោះពុម្ព</th>
      <th>លេខសៀវភៅ (ISBN)</th>
    </tr>
  </thead>
  <tbody>
  <?php
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
    echo "<tr><td colspan='6'>មិនមានទិន្នន័យ!</td></tr>";
  }
  ?>
  </tbody>
</table>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
  $('#bookForm').on('submit', function(e) {
  e.preventDefault();

  $.ajax({
    url: 'action/save-book.php',
    type: 'POST',
    data: $(this).serialize(),
    success: function(res) {
      const data = JSON.parse(res);
      if (data.success) {
        alert('✅ រក្សាទុកបានជោគជ័យ!');

        const newRow = `
          <tr>
            <td>${data.rowNumber}</td>
            <td>${data.title}</td>
            <td>${data.author}</td>
            <td>${data.category}</td>
            <td>${data.year}</td>
            <td>${data.isbn}</td>
          </tr>`;

        $('#booksTable tbody').append(newRow); 
        $('#bookForm')[0].reset(); 
      } else {
        alert('បញ្ចូលបរាជ័យ');
      }
    },
    error: function() {
      alert('មានបញ្ហាក្នុងការបញ្ចូលទិន្នន័យ');
    }
  });







});



$('#searchInput').on('keyup', function () {
  const search = $(this).val();

  $.ajax({
    url: 'action/search-data.php',
    type: 'POST',
    data: { search: search },
    success: function (res) {
      $('#booksTable tbody').html(res);
    },
    error: function() {
      alert("មិនអាចទាក់ទងទៅ search-data.php បានទេ");
    }
  });
});

</script>

</body>
</html>
