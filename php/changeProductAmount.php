
<?php

   include("connection.php");

   $id = $_POST["id"];
   $operation = $_POST["operation"];
   $currentAmount = $_POST["currentAmount"];
   $amountToOperate = $_POST["amountToOperate"];
   $newAmount = 0;

   if($operation === "Entrada"){
      $newAmount = $currentAmount + $amountToOperate;
   }elseif($operation === "Salida"){
      $newAmount = $currentAmount - $amountToOperate;
   }

   $pdo = connect();
   $query = "USE $db_name";
   $pdo->query($query);
   $query =
      "UPDATE $table_name SET 
         cantidad = :cantidad
      WHERE (
         id = :id
      )";
   $result = $pdo->prepare($query);
   $result->bindValue(":cantidad", $newAmount);
   $result->bindValue(":id", $id);
   $result->execute();
   $pdo = null;

?>