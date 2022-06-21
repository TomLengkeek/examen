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
                include(APPROOT . "/views/includes/sidenavbar.php");
                ?>
            </ul>
        </div>
        <div class="main_content">
            <div class="header">mededeling toevoegen</div>
            <div class="info">
                <form action="<?= URLROOT; ?>mededelingen/addMededeling" method="post">
                    <div class="form-group">
                        <label for="">Mededeling</label>
                        <input type="text" name="mededeling" value="<?= $data["row"]->mededeling; ?>" class="form-control">
                    </div>
                    <input type="hidden" name="old" value="<?=$data["row"]->email ?>">
                    <div class="form-group">
                        <button type="submit" name="update" class="btn btn-primary">mededeling toevoegen</button>
                    </div>
                </form>
            </div>
        </div>

</body>

</html>