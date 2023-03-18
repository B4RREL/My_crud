<?php require("connection.php"); ?>

<?php

  $id = $_GET["id"];

  echo $id;

  $delete = $conn->query("DELETE FROM user WHERE id='$id'");
  $delete->execute();

  session_start();
  session_unset();
  session_destroy();

  header("location: register.php");

?>