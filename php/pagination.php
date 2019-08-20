
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

   for($i = 1 ; $i <= $totalPages; $i++){
      if($i == $currentPage){
         $output .= "<button type='button' class='btn btn-warning btn-sm ml-1 pageButton' id='$i' disabled>$i</button>";
      }else{
         $output .= "<button type='button' class='btn btn-warning btn-sm ml-1 pageButton' id='$i'>$i</button>";
      }
   }

   $pdo = null;

   echo($output);

?>