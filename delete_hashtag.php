<?php
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "hashtag_curs";
  $conn = new mysqli($servername, $username, $password, $dbname);
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  // Получаем ID хт для удал. из БД
  $tag_id = $_POST["tag_id"];

  // Подготав. запрос на удаление хт из БД
  $stmt = $conn->prepare("DELETE FROM hashtags WHERE id = ?");
  $stmt->bind_param("i", $tag_id);
  $stmt->execute();
  $stmt->close();

  $conn->close();
  header("Location: index.php");
?>
