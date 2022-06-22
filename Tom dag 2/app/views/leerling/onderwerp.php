<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="<?= APPROOT ?>/public/css/style.css">
    <title>Instructeur</title>
    <style>
        section {
            max-width: 20%;
            box-shadow: 20px 20px 50px grey;
            border: 1px solid white;
            border-radius: 25px;
            background-color: white;
            text-align: center;
        }


        .col-12 {
            margin-top: 10px;

            margin-top: 10%;
        }
    </style>
    <link rel="stylesheet" href="<?php URLROOT ?>/public/css/style.css">
</head>

<body>
    <div class="col-12">
        <center>
        <section>
            <h2>Onderwerp van de les</h1>
                <textarea name="opmerking" cols="30" rows="10" disabled><?php
                        echo $data["onderwerp"];
                    ?></textarea>
                <a href="<?=URLROOT?>/leerling/Vread"><button class="btn btn-success">Terug</button></a>
        </section>
        </center>
    </div>
    </div>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>