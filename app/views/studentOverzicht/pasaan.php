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





        <form action="<?= URLROOT; ?>/overzicht/update" method="POST">
            <table>
                <tbody>
                    <tr>
                        <td>
                            <label for="voornaam">ziek:</label>
                            <input type="text" name="voornaam" id="voornaam" value="<?= $data["row"]->voornaam ?>">
                        </td>
                    </tr>
                    <tr>
                        <label for="category">Reden:</label>
                        <select name="annuleerlessen" id="annuleerlessen" required>
                            <option value="<?= $data["row"]->annuleerlessen ?>">--- Kies een reden: ---</option>
                            <?php echo $data['records'] ?>
                        </select>
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