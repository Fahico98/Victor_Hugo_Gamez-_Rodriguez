
<?php

   include("connection.php");

   $id = $_POST["id"];
   $pdo = connect();
   $query = "USE $db_name";
   $pdo->query($query);
   $query = "SELECT * FROM $table_name WHERE id = $id";
   $result = $pdo->query($query);
   $pdo = null;

   $output = "";
   foreach($result as $row){
      $output .=
         $row["nombre_producto"]    . "{}" .
         $row["marca"]              . "{}" .
         $row["numero_de_serie"]    . "{}" .
         $row["maximo"]             . "{}" .
         $row["minimo"]             . "{}" .
         $row["cantidad"]           . "{}" .
         $row["almacen"]            . "{}" .
         $row["gabeta_o_rack"]      . "{}" .
         $row["nivel"]              . "{}" .
         $row["ubicacion"];
   }
   echo($output);

?>