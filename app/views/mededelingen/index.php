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
            <div class="header">Wagenpark gegevens</div>
            <div class="info">
                <div class="row">
                    <div class="col-md-12">
                        <?= $data["alert"] ?>
                        <h1 class="text-center">Leerlingen</h1>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>email</th>
                                    <th>rol</th>
                                    <th>naam</th>
                                    <th>telefoonnummer</th>
                                    <th>mededeling</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?= $data["tbody"]; ?>
                            </tbody>
                        </table>
                        <br></br>
                        <h1 class="text-center">Instructeurs</h1>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>email</th>
                                    <th>rol</th>
                                    <th>naam</th>
                                    <th>telefoonnummer</th>
                                    <th>mededeling</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?= $data["tbody"]; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
</body>

</html>