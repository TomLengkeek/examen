<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>

    <a id="linkje" style="padding-left: 150px;" href="<?= URLROOT; ?>/AutoOverzichten/CreateAuto"><button style="" class="btn btn-primary btn-lg active"> Create Auto</button></a>
    <?= $data["alert"]; ?>
    <div class="container">
        <div class="row">
            <h1 id="overzichtje">Garagepark ...</h1>
        </div>
        <div class="row">
            <div class="col">
                <table class="table table-dark table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Auto_Id</th>
                            <th scope="col">Auto_Type</th>
                            <th scope="col">Auto_Model</th>
                            <th scope="col">Auto_Kleur</th>
                            <th scope="col">Transmissie_Naam</th>
                            <th scope="col">Auto_Nummer</th>
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