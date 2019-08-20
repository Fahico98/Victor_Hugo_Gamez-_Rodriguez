
<?php

   include("connection.php");

   $productName = $_POST["productName"];
   $pdo = connect();
   $query = "USE $db_name";
   $pdo->query($query);
   $query = "SELECT * FROM $table_name WHERE nombre_producto = '$productName'";
   $result = $pdo->query($query);
   $output = $result->rowCount();
   $pdo = null;
   echo($output);

?>