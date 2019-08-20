
<?php

   include("connection.php");

   $currentPage = $_POST["page"];
   $parameter = $_POST["parameter"];
   $parameterValue = $_POST["parameterVal"];
   $scapedParameterValue = htmlentities(addslashes($parameterValue));

   $output = "";
   $perPage = 25;
   $pdo = connect();
   $query = "USE $db_name";
   $pdo->query($query);
   if($parameter === ""){
      $query = "SELECT * FROM $table_name ORDER BY id DESC";
   }else{
      $query = "SELECT * FROM $table_name WHERE $parameter LIKE '%$scapedParameterValue%' ORDER BY id DESC";
   }
   $result = $pdo->query($query);
   $totalPages = ceil($result->rowCount() / $perPage);
   if($parameter === ""){
      $query = "SELECT * FROM $table_name ORDER BY id DESC LIMIT " . ($currentPage - 1) * $perPage . ",$perPage";
   }else{
      $query = "SELECT * FROM $table_name WHERE $parameter LIKE '%$scapedParameterValue%' ORDER BY id DESC LIMIT " .
         ($currentPage - 1) * $perPage . ",$perPage";
   }
   $result = $pdo->query($query);
   if($result->rowCount() !== 0){
      foreach($result as $row){
         $output .= 
            "<tr class='text-center'>
               <th scope='row' class='idCell'>" . str_pad($row["id"], 4, "0", STR_PAD_LEFT) . "</th>
               <td>" . $row["nombre_producto"] .                  "</td>
               <td>" . $row["marca"] .                            "</td>
               <td>" . $row["numero_de_serie"] .                  "</td>
               <th class='amountCell'>" . $row["cantidad"] .      "</th>
               <td>" . $row["maximo"] . "/" . $row["minimo"] .    "</td>
               <td>" . $row["almacen"] .                          "</td>
               <td>" . $row["gabeta_o_rack"] .                    "</td>
               <td>" . $row["nivel"] .                            "</td>
               <td>" . $row["ubicacion"] .                        "</td>
               <td class='actionsCell'>
                  <i class='fas fa-trash-alt deleteButton' id='" . $row["id"] . "' data-toggle='tooltip' data-placement='bottom'
                     title='Eliminar'></i>
                  <i class='fas fa-edit ml-1 editButton' id='" . $row["id"] . "' data-toggle='modal' data-target='#modalWindow'
                     data-toggle='tooltip' data-placement='bottom' title='Editar'></i>
                  <i class='fas fa-exchange-alt ml-1 changeButton' id='" . $row["id"] . "' data-toggle='modal'
                     data-target='#modalChangingWindow' data-toggle='tooltip' data-placement='bottom'
                     title='Entrada y Salida de Productos'></i>
               </td>
            </tr>";
      }
   }

   $pdo = null;
   
   echo($output);
   
?>