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
                require APPROOT . '/views/includes/sidenavbar.php';
                ?>
            </ul>
        </div>
        <div class="main_content">
            <div class="header">reeds gevolgde lessen</div>
            <div class="info">
                <div class="row">
                    <div class="col-md-12">
                        <?= $data["alert"] ?>
                        <h1 class="text-center">golvolgde lessen</h1>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Datum</th>
                                    <th>Leerling</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?= $data["tbody"]; ?>
                            </tbody>
                        </table>
                        <h3>aantal nog tevolgen lessen: 2</h3>

                        <a href="<?=URLROOT;?>lessen/pakketInformatie">Pakketten</a>
                        
                    </div>
                </div>
            </div>
        </div>
</body>

</html>