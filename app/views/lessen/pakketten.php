<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <title>home</title>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <div class="wrapper">
        <div class="sidebar">
            <ul>
                <?php
                //require voor een navbar op de pagina
                require APPROOT . '/views/includes/sidenavbar.php';
                ?>
            </ul>
        </div>
        <div class="main_content">
            <div class="header">hier kun je alle pakketten zien</div>
            <div class="info">
                <div class="row">
                    <div class="col-md-12">
                        <!-- haalt de data op die opgeslagen is in "alert" voor als er een error message is -->
                        <?= $data["alert"] ?>
                        <h1 class="text-center">pakketten</h1>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Naam</th>
                                    <th>Prijs</th>
                                    <th>Aantal lessen</th>
                                    <th>CBR examen</th>
                                    <th>Betaal termijnen</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- haalt de data op die opgeslagen is in "tdbody" voor de table op de website -->
                                <?= $data["tbody"]; ?>
                            </tbody>
                        </table>
                        <br></br>
                        <h3 class="text-center">5 lessen van 1 uur</h3>
                        <div class="text-center">
                            <button type="button" class="btn btn-primary">Betaal in een keer (€440)</button>
                            <button type="button" class="btn btn-primary">Betaal in termijn 2 X (€220)</button>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
</body>

</html>