<?php
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "hashtag_curs";
  $conn = new mysqli($servername, $username, $password, $dbname);
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  // Получ. ID хт из GET-парам.
  $tag_id = $_GET["id"];

  // Получаем данные хт из БД
  $sql = "SELECT * FROM hashtags WHERE id = " . $tag_id;
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $tag_name = $row["tag_name"];
    $tag_description = $row["tag_description"];
    $author_name = $row["author_name"];
    $created_at = $row["created_at"];
  } else {
    // переход на главную если хт не найден
    header("Location: index.php");
  }
?>