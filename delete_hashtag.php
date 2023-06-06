<?php
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "hashtag_curs";
  $conn = new mysqli($servername, $username, $password, $dbname);
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  // Получаем ID хештега для удаления из базы данных
  $tag_id = $_POST["tag_id"];

  // Подготавливаем запрос на удаление хештега из базы данных
  $stmt = $conn->prepare("DELETE FROM hashtags WHERE id = ?");
  $stmt->bind_param("i", $tag_id);
  $stmt->execute();
  $stmt->close();

  $conn->close();
  header("Location: index.php");
?>
