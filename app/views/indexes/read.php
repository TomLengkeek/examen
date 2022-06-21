<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>


    <?= $data["alert"]; ?>
    <div class="container">
        <div class="row">
            <h1 id="overzichtje">Garagepark ...</h1>
        </div>
        <a id="linkje" href="<?= URLROOT; ?>/AutoOverzichten/CreateAuto"><button style="" class="btn btn-primary btn-lg active"> Voeg een auto Toe</button></a>
        <a id="linkje" href="<?= URLROOT; ?>/Autokms/indexKilometers"><button style="" class="btn btn-primary btn-lg active"> Kilometers toevoegen</button></a>
        <div class="row">
            <div class="col">
                <table class="table table-dark table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Type</th>
                            <th scope="col">Model</th>
                            <th scope="col">Kleur</th>
                            <th scope="col">Transmissie</th>
                            <th scope="col">Kilometerstand</th>
                            <th scope="col">AutoNummer</th>
                            <th scope="col">Beschikbaar</th>
                            <th scope="col">Createdate</th>
                            <th scope="col">Updatedate</th>
                            <th scope="col">edit</th>
                            <th scope="col">delete</th>
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