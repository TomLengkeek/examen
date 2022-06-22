<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="<?= APPROOT ?>/public/css/style.css">
  <title>PaasHaas</title>
  <style>
    section {
      max-width: 30%;
      box-shadow: 20px 20px 50px grey;
      border:1px solid white;
      border-radius: 25px;
      background-color: white;
    }

    h1{
      text-align: center;
    }

    form{
      margin: 3%;
    }

    .col-12 {
      margin-top: 10px;
      margin-left: 35%;
      margin-top: 15%;
    }
  </style>
  <link rel="stylesheet" href="<?php URLROOT?>/public/css/style.css">
</head>

<body>
  <div class="col-12">
    <section>
      <h1>Login</h1>
      <form method="post" action="<?php URLROOT ?>/home/login">
        <div class="mb-3">
          <label for="gebruikersnaam" class="form-label">Name</label>
          <input type="text" class="form-control" id="gebruikersnaam" name="name" required>
        </div>
        <div class="mb-3">
          <label for="password" class="form-label">Password</label>
          <input type="password" class="form-control" id="password" name="password" requried>
        </div>
        <button type="submit" class="btn btn-success">Submit</button>
      </form>
    </section>
  </div>
  </div>

  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>