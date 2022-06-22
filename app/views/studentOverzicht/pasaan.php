<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div style="padding-left: 500px;
            margin-top: 75px;">
        <?php echo $data->id ?>




        <form action="<?= URLROOT; ?>/StudentLesOverzichten/deleteAfspraak" method="POST">
            <table>
                <tbody>
                    <tr>
                        <td>
                            <label for="id">ziek:</label>
                            <input type="text" name="id" id="id" value="<?= $data->id ?>">
                        </td>
                    </tr>
                    <tr>
                        <input type="hidden" id="id">
                    </tr>
                    <tr>
                        <td>
                            <input type="submit" value="verzenden">
                        </td>
                    </tr>
                </tbody>
            </table>
        </form>
    </div>
</body>

</html>