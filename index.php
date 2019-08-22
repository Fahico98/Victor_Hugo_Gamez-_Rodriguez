<?php
   include("php/createDatabase.php");
   createDatabase();
?>

<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <title>Victor Gamez</title>

      <!-- Own CSS -->
      <link rel="stylesheet" href="css/mainStyle.css">

      <!-- Bootstrap CSS -->
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css"
         integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">

      <!-- Font Awesome CSS -->
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css"
         integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
   </head>
   <body>
      <div class="container my-5">
         <div class="row d-flex justify-content-center my-4">
            <h2 class="my-3">Registro de Almacen</h2>
         </div>
         <div class="row d-flex justify-content-start mx-1 mb-3 mt-5">

            <div class="form-group row mx-2 my-0">
               <!-- Modal Trigger Button -->
               <button id="modalTriggerButton" name="modalTriggerButton" type="button" class="btn btn-warning" data-toggle="modal"
                  data-target="#modalWindow">
                  Agregar producto
               </button>
               <div class="btn-group ml-2">
                  <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown"
                     aria-haspopup="true" aria-expanded="false" id="searchButtonDropdown" name="searchButtonDropdown"
                     style="width: 160px;">Numero de serie</button>
                  <div class="dropdown-menu" id="searchOptionsDropdown" name="searchOptionsDropdown">
                     <option value="entrada" class="dropdown-item searchOption">Numero de serie</option>
                     <option value="salida" class="dropdown-item searchOption">Nombre</option>
                  </div>
               </div>
               <div class="col ml-2 px-0 w-100">
                  <input type="number" class="form-control" placeholder="Numero de serie" id="searchInput" name="searchInput" style="width: 300px;">
               </div>
            </div>

            <!-- Modal Window -->
            <div class="modal fade border-dark" id="modalWindow" tabindex="-1" role="dialog" aria-labelledby="modalWindowTitle"
               aria-hidden="true">
               <div class="modal-dialog modal-dialog-scrollable" role="document">
                  <div class="modal-content">
                     <div class="modal-header bg-warning">
                        <h5 class="modal-title" id="modalWindowTitle">Agregar nuevo producto</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                           <span aria-hidden="true">&times;</span>
                        </button>
                     </div>
                     <form id="newProductForm" autocomplete="off">
                        <div class="modal-body">
                           <div class="form-group input-group-sm">
                              <label for="productName">Producto</label>
                              <input type="text" class="form-control" name="productName" id="productName" aria-describedby="productNameHelp"
                                 placeholder="Nombre del producto">
                              <small id="productNameHelp" class="helpText mb-0 pb-0"></small>
                           </div>
                           <div class="form-group input-group-sm">
                              <label for="brand">Marca</label>
                              <input type="text" class="form-control" name="brand" id="brand" aria-describedby="brandHelp" placeholder="Marca">
                              <small id="brandHelp" class="helpText mb-0 pb-0"></small>
                           </div>
                           <div class="form-group input-group-sm">
                              <label for="seriesNumber">Número de serie</label>
                              <input type="text" class="form-control" name="seriesNumber" id="seriesNumber" aria-describedby="seriesNumberHelp"
                                 placeholder="Número de serie">
                              <small id="seriesNumberHelp" class="helpText mb-0 pb-0"></small>
                           </div>
                           <div class="form-group input-group-sm">
                              <label for="amount" id="amountLabel">Cantidad inicial</label>
                              <input type="number" class="form-control" name="amount" id="amount" aria-describedby="amountHelp"
                                 placeholder="Cantidad">
                              <small id="amountHelp" class="helpText mb-0 pb-0"></small>
                           </div>
                           <div class="form-group">
                              <label for="amount">Limites de cantidad</label>
                              <div class="row">
                                 <div class="col-6 pl-3 pr-1 input-group-sm">
                                    <input type="number" class="form-control" name="amountMin" id="amountMin" aria-describedby="amountMinHelp" 
                                       placeholder="Cantidad mínima">
                                    <small id="amountMinHelp" class="helpText mb-0 pb-0"></small>
                                 </div>
                                 <div class="col-6 pl-1 pr-3 input-group-sm">
                                    <input type="number" class="form-control" name="amountMax" id="amountMax" aria-describedby="amountMaxHelp"
                                       placeholder="Cantidad máxima">
                                    <small id="amountMaxHelp" class="helpText mb-0 pb-0"></small>
                                 </div>
                              </div>
                           </div>
                           <div class="form-group input-group-sm">
                              <label for="store">Almacen</label>
                              <input type="number" class="form-control" name="store" id="store" aria-describedby="storeHelp" 
                                 placeholder="Número del almacen">
                              <small id="storeHelp" class="helpText mb-0 pb-0"></small>
                           </div>
                           <div class="form-group input-group-sm">
                              <label for="rack">Gabeta o Rack</label>
                              <input type="text" class="form-control" name="rack" id="rack" aria-describedby="rackHelp"
                                 placeholder="Nombre de la gabeta">
                              <small id="rackHelp" style="color: red;" class="helpText mb-0 pb-0"></small>
                           </div>
                           <div class="form-group input-group-sm">
                              <label for="level">Nivel</label>
                              <input type="text" class="form-control" name="level" id="level" aria-describedby="levelHelp" placeholder="Nivel">
                              <small id="levelHelp" class="helpText mb-0 pb-0"></small>
                           </div>
                           <div class="form-group input-group-sm">
                              <label for="productLocation">Ubicacion</label>
                              <input type="text" class="form-control" name="productLocation" id="productLocation"
                                 aria-describedby="productLocationHelp" placeholder="Ubicación">
                              <small id="productLocationHelp" class="helpText mb-0 pb-0"></small>
                           </div>
                        </div>
                        <div class="modal-footer my-0 py-3 pb-0">
                           <button type="button" class="btn btn-outline-dark" id="cancelButton" data-dismiss="modal">Cancelar</button>
                           <button type="submit" class="btn btn-warning" id="submitButton">Guardar</button>
                        </div>
                     </form>
                  </div>
               </div>
            </div>

            <!-- Changing Modal Window -->
            <div class="modal fade" id="modalChangingWindow" name="modalChangingWindow" tabindex="-1" role="dialog"
               aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
               <div class="modal-dialog modal-dialog-centered" role="document">
                  <div class="modal-content">
                     <div class="modal-header bg-warning">
                        <h5 class="modal-title" id="exampleModalCenterTitle">Entrada y Salida de Productos</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                           <span aria-hidden="true">&times;</span>
                        </button>
                     </div>
                     <form id="changeAmountForm" autocomplete="off">
                        <div class="modal-body">
                           <div class="row">
                              <label class="col">
                                 Recuerde que la cantidad de unidades de este producto esta limitada por los siguientes valores.
                                 <br>
                                 Unidades máximas: <strong id="amountMaxLabel" name="amountMaxLabel"></strong>
                                 <br>
                                 Unidades mínimas: <strong id="amountMinLabel" name="amountMinLabel"></strong>
                                 <br>
                                 Unidades actuales: <strong id="currentAmountLabel" name="currentAmountLabel"></strong>
                              </label>
                           </div>
                           <hr>
                           <div class="row">
                              <div class="col-4 pl-3 pr-0">
                                 <div class="btn-group">
                                    <button type="button" class="btn btn-dark dropdown-toggle" data-toggle="dropdown"
                                       aria-haspopup="true" aria-expanded="false" id="changeButtonDropdown" name="changeButtonDropdown"
                                       style="width: 140px;">Entrada</button>
                                    <div class="dropdown-menu" id="changeOptionsDropdown" name="changeOptionsDropdown">
                                       <option value="entrada" class="dropdown-item changeOption">Entrada</option>
                                       <option value="salida" class="dropdown-item changeOption">Salida</option>
                                    </div>
                                 </div>
                              </div>
                              <div class="col-8 pr-3 pl-0">
                                 <input type="number" class="form-control" placeholder="Cantidad" id="amountToOperate" name="amountToOperate">
                              </div>
                           </div>
                           <small id="changeAmountHelp" class="helpText mb-0 pb-0"></small>
                        </div>
                        <div class="modal-footer my-0 py-3 pb-0">
                           <button type="button" class="btn btn-outline-dark" id="cancelChangingButton" data-dismiss="modal">Cancelar</button>
                           <button type="submit" class="btn btn-warning" id="submitChangingButton">Aceptar</button>
                        </div>
                     </form>
                  </div>
               </div>
            </div>

         </div>
         <table class="table">
            <thead class="bg-warning text-center align-middle">
               <tr>
                  <th scope="col">Id</th>
                  <th scope="col">Nombre</th>
                  <th scope="col">Marca</th>
                  <th scope="col">Número de<br>serie</th>
                  <th scope="col">Cantidad</th>
                  <th scope="col">Cantidades<br>Máxima/Mínima</th>
                  <th scope="col">Almacen</th>
                  <th scope="col">Gabeta/Rack</th>
                  <th scope="col">Nivel</th>
                  <th scope="col">Ubicacion</th>
                  <th scope="col" class="actionsCell"></th>
               </tr>
            </thead>
            <tbody id="tableBody" name="tableBody"></tbody>
         </table>
         <div id="pagination" class="text-center mt-5"></div>
      </div>

      <!-- jQuery Script -->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js" language="JavaScript" type="text/javascript"></script>
      
      <!-- Bootstrap Scripts -->
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"
         integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"
         integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>

      <!-- Own Script -->
      <script src="javascript/mainScript.js"></script>
   </body>
</html>