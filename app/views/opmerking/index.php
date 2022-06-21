<?php

include("Navbar.php");

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  </head>
  <body>
<?php
if(!empty($data["alert"]))
   echo $data["alert"];
   header("Refresh: ; url=" . URLROOT. "/opmerking/index");
?>
<div class = "col-12">
 <a href="http://Examenopdracht/opmerking/create" type= "button" style="float: right; margin-bottom : 20px;"class="btn btn-danger btn-lg btn-block"> Nieuwe record toevoegen</a><h1 style="margin-top : 20px; margin-bottom : 20px;">Overzicht van uw volgedaande lessen</h1>
 
</div>
<!--de tabel van leerling  -->
  <table class="table">
  <thead>
    <tr>
      <th scope="col">Naam leerling</th>
      <th scope="col">Datum</th>
      <th scope="col">Leerling cijfer</th>
      <th scope="col">Onderdeel</th>
      <th scope="col">Les</th>
      <th scope="col">opmerkingen</th>
    </tr>
  </thead>
  <tbody>
      <?= $data["records"]?>
  </tbody>
</table>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
  </body>
</html>