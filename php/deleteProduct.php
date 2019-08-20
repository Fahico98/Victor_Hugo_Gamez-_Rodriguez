
<?php

   include("connection.php");

   $id = $_POST["id"];
   $pdo = connect();
   $query = "USE $db_name";
   $pdo->query($query);
   $query = "DELETE FROM $table_name WHERE id = $id";
   $pdo->query($query);
   $pdo = null;

?>