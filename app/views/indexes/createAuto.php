<html>

<body>
    <div style="padding-left: 500px;
            margin-top: 200px;">
        <?= $data['Title']; ?>


        <form action="<?= URLROOT; ?>/AutoOverzichten/CreateAuto" method="post">
            <table>
                <tbody>
                    <tr>
                        <td>
                            <label for="Auto_Type">Auto Type</label>
                            <select name="Auto_Type" id="Auto_Type">
                                <option value="">--- Kies een auto ---</option>
                                <?php echo $data['records'] ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="Auto_Model">Auto Model:</label>
                            <input type="text" name="Auto_Model" id="Auto_Model">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="Auto_Kleur">Auto Kleur:</label>
                            <input type="text" name="Auto_Kleur" id="Auto_Kleur">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="Transmissie_Naam">Transmissie Naam</label>
                            <select name="Transmissie_Naam" id="Transmissie_Naams">
                                <option value="">--- Kies een transmissie ---</option>
                                <?php echo $data['recordsTransmissie'] ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="Kilometerstand">Kilometerstand</label>
                            <input type="text" name="Kilometerstand" id="Kilometerstand">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="Auto_Nummer">Auto Nummer:</label>
                            <input type="text" name="Auto_Nummer" id="Auto_Nummer">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="Beschikbaar">Beschikbaar:</label>
                            <input type="text" name="Beschikbaar" id="Beschikbaar">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="Date_Create">Date_Create:</label>
                            <input type="date" name="Date_Create" id="Date_Create">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="Date_Update">Date_Update:</label>
                            <input type="date" name="Date_Update" id="Date_Update">
                        </td>
                    </tr>
                    </tr>
                    <tr>
                        <td>
                            <input type="submit" value="Verzenden">
                        </td>
                    </tr>
                </tbody>
            </table>
        </form>
    </div>
</body>

</html>