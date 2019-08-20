
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
   
   $pdo = connect();
   $query = "USE $db_name";
   $pdo->query($query);
   $query = 
      "INSERT INTO $table_name (
         nombre_producto,
         marca,
         numero_de_serie,
         cantidad,
         maximo,
         minimo,
         almacen,
         gabeta_o_rack,
         nivel,
         ubicacion
      ) VALUES (
         :nombre_producto,
         :marca,
         :numero_de_serie,
         :cantidad,
         :maximo,
         :minimo,
         :almacen,
         :gabeta_o_rack,
         :nivel,
         :ubicacion
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
   $result->execute();
   $pdo = null;

?>