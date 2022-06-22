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
            <div class="header">hier kun je je lessen inzien</div>
            <div class="info">
                <div class="row">
                    <div class="col-md-12">
                        <?= $data["alert"] ?>
                        <h1 class="text-center">Hallo Konijn dit zijn jou lessen</h1>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Datum</th>
                                    <th>pakket</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?= $data["tbody"]; ?>
                            </tbody>
                        </table>
                        <button href="#" type="button" class="btn btn-primary">Terug naar leerling kiezen</button>
                    </div>
                </div>
            </div>
        </div>
</body>

</html>