<?php
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "hashtag_curs";
  $conn = new mysqli($servername, $username, $password, $dbname);
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  // Получ. данные из формы добав. хт
  $tag_name = $_POST["tag_name"];
  $tag_description = $_POST["tag_description"];
  $author_name = $_POST["author_name"];

  // Подгот. запрос на добавление хт в БД
  $stmt = $conn->prepare("INSERT INTO hashtags (tag_name, tag_description, author_name) VALUES (?, ?, ?)");
  $stmt->bind_param("sss", $tag_name, $tag_description, $author_name);
  $stmt->execute();
  $stmt->close();

  $conn->close();
  header("Location: index.php");
?>
