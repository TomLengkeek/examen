<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Update</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  </head>

  <body>
      
  <form action ="<?php URLROOT ?>/instructeurlessen/update" method="POST">
  <div class="mb-3">

<!-- Kolom voor Onderdeel-->
    <label for="exampleInputOpmerking" class="form-label">Onderdeel</label>
    <input type="text" class="form-control" id="Onderdeel" aria-describedby="emailHelp" name="Onderdeel" value="<?=$data["info"]->Onderdeel ?>" required> 
  </div>
 
  
<!-- een onzichtbare tag van Id die meegegeven word bij Onderdeel -->
  <input type="hidden" name="Id" value="<?=$data["info"]->Id ?>">

<!--Button voor op te slaan -->
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
  </body>
</html>