<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Update</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  </head>

  <body>
      
  <form action ="<?php URLROOT ?>/opmerking/update" method="POST">
  <div class="mb-3">

<!-- Kolom voor Opmerking-->
    <label for="exampleInputOpmerking" class="form-label">Opmerking</label>
    <input type="text" class="form-control" id="Opmerking" aria-describedby="emailHelp" name="Opmerking" value="<?=$data["info"]->Opmerking ?>" required> 
  </div>
<!-- kolom voor Les -->
  <label for="exampleInputLes" class="form-label">LesId</label>
    <input type="text" class="form-control" id="Les" aria-describedby="emailHelp" name="Id" value="<?=$data["info"]->Id ?>" required> 
  </div>

  <input type="hidden" name="oldOpmerking" value="<?=$data["info"]->Opmerking ?>">

<!--Button voor updaten -->
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
  </body>
</html>