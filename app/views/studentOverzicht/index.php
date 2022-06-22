<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>


        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    </head>

    <body>


        <?php
        if (!empty($data["alert"])) {
            echo $data["alert"];
            header("Refresh: 2; url=" . URLROOT . "/StudentLesOverzicht/index");
        }
        ?>
        <div class="container">
            <div class="row">
                <h1 id="overzichtje">Lessen</h1>
            </div>
            <a id="linkje" href="<?= URLROOT; ?>/AutoOverzichten/CreateAuto"><button style="" class="btn btn-primary btn-lg active"> Voeg een auto Toe</button></a>
            <a id="linkje" href="<?= URLROOT; ?>/Autokms/indexKilometers"><button style="" class="btn btn-primary btn-lg active"> Kilometers toevoegen</button></a>
            <a id="linkje" href="<?= URLROOT; ?>/StudentLesOverzichten/index"><button style="" class="btn btn-primary btn-lg active"> StudentLesOverzicht</button></a>
            <div class="row">
                <div class="col">
                    <table class="table table-dark table-hover">
                        <thead>
                            <tr>
                                <th scope="col">id</th>
                                <th scope="col">Datum</th>
                                <th scope="col">Instructeur</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?= $data['data']; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>






    </body>

    </html>