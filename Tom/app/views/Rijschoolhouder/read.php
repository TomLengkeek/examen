<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="<?= APPROOT ?>/public/css/style.css">
    <title>Rijschoolhouder</title>
    <style>
        .col-12 {
            margin-top: 10px;
            padding-left:5%;
            padding-right:5%;
            margin-top: 15%;
        }
    </style>
    <link rel="stylesheet" href="<?php URLROOT ?>/public/css/style.css">
</head>

<body>
    <?php show_message("/rijschoolhouder/Vread/" . $data["pageNumber"], $data["alert"]); ?>
    <div class="col-12">
        <section>
        <table class="table table-dark table-hover" style="text-overflow: ellipsis">
                    <thead>
                        <tr>
                            <th scope="col">Voornaam</th>
                            <th scope="col">Achternaam</th>
                            <th scope="col">woonplaats</th>
                            <th scope="col">telefoonnummer</th>
                            <th scope="col">status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        echo $data['records'];
                        ?>
                    </tbody>
                </table>
                <nav aria-label="Page navigation example">
                <ul class="pagination">
                    <?=$data["pageItems"]?>
                </ul>
                </nav>
        </section>
    </div>
    </div>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>