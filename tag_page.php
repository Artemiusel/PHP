<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hashtag_curs";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Получаем название хештега, на который пользователь нажал
$clicked_tag = $_GET['tag'];

// Получаем хештеги из базы данных, которые схожи по названию с тем, на который пользователь нажал
$sql = "SELECT * FROM hashtags WHERE tag_name LIKE '%$clicked_tag%'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table>";
    echo "<thead>";
    echo "<tr>";
    echo "<th>ID</th>";
    echo "<th>Хештег</th>";
    echo "<th>Описание</th>";
    echo "<th>Автор</th>";
    echo "<th>Дата создания</th>";
    echo "</tr>";
    echo "</thead>";
    echo "<tbody>";
    while ($row = $result->fetch_assoc()) {
      echo "<tr>";
      echo "<td>" . $row["id"] . "</td>";
      echo "<td>" . $row["tag_name"] . "</td>";
      echo "<td>" . $row["tag_description"] . "</td>";
      echo "<td>" . $row["author_name"] . "</td>";
      echo "<td>" . $row["created_at"] . "</td>";
      echo "</tr>";
    }
    echo "</tbody>";
    echo "</table>";
}   else {
    echo "<p>Нет записей с хештегами, схожими с '$clicked_tag'.</p>";
}
  



$conn->close();
?>
