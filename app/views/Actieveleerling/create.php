<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  <!-- Dit is mijn eigen style.css-->
  <link rel="stylesheet" href="./css/style.css">
  <style>

  </style>
  <title>Aanwezigen</title>
</head>

<body>
<form action ="<?php URLROOT ?>/todo/create" method="POST">
  <main class="container">
    <div class="row">
    </div>
    <div class="row">
      <div class="col-12">
        <div class="jumbotron jumbotron-fluid">
          <div class="container">
            <h1 class="display-4">record maken.</h1>
            <p class="lead">Deze page maakt u nieuwe records aan.</p>
          </div>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-5">

        <!-- Kolom voor email-->
    <label for="exampleInputEmail1" class="form-label">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email" required> 
  </div>

<!-- Kolom voor voornaam-->
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">voornaam</label>
    <input type="text" class="form-control" id="voornaam"name="voornaam" required>
  </div>

<!-- Kolom voor achternaam-->
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">achternaam</label>
    <input type="text" class="form-control" id="achternaam"name="achternaam" required>
  </div>

  <!--Button voor updaten -->
  <button type="submit" class="btn btn-primary">Submit</button>
</form>




  </main>

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>