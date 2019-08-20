
<?php

   include("connection.php");

   $productName = strtolower($_POST["productName"]);
   $brand = $_POST["brand"];
   $seriesNumber = $_POST["seriesNumber"];
   $amount = $_POST["amount"];
   $amountMax = $_POST["amountMax"];
   $amountMin = $_POST["amountMin"];
   $store = $_POST["store"];
   $rack = $_POST["rack"];
   $level = $_POST["level"];
   $productLocation = $_POST["productLocation"];
   $productId = $_POST["id"];

   $pdo = connect();
   $query = "USE $db_name";
   $pdo->query($query);
   $query =
      "UPDATE $table_name SET 
         nombre_producto = :nombre_producto,
         marca = :marca,
         numero_de_serie = :numero_de_serie,
         cantidad = :cantidad,
         maximo = :maximo,
         minimo = :minimo,
         almacen = :almacen,
         gabeta_o_rack = :gabeta_o_rack,
         nivel = :nivel,
         ubicacion = :ubicacion 
      WHERE (
         id = :id
      )";
   $result = $pdo->prepare($query);
   $result->bindValue(":nombre_producto", $productName);
   $result->bindValue(":marca", $brand);
   $result->bindValue(":numero_de_serie", $seriesNumber);
   $result->bindValue(":cantidad", $amount);
   $result->bindValue(":maximo", $amountMax);
   $result->bindValue(":minimo", $amountMin);
   $result->bindValue(":almacen", $store);
   $result->bindValue(":gabeta_o_rack", $rack);
   $result->bindValue(":nivel", $level);
   $result->bindValue(":ubicacion", $productLocation);
   $result->bindValue(":id", $productId);
   $result->execute();
   $pdo = null;

?>
