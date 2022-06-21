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
                            <label for="Auto_Type">Auto_Type</label>
                            <select name="Auto_Type" id="Auto_Type">
                                <option value="">--- Kies een auto ---</option>
                                <?php echo $data['records'] ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="Auto_Model">Auto_Model:</label>
                            <input type="text" name="Auto_Model" id="Auto_Model">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="Auto_Kleur">Auto_Kleur:</label>
                            <input type="text" name="Auto_Kleur" id="Auto_Kleur">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="Transmissie_Naam">Transmissie_Naam</label>
                            <select name="Transmissie_Naam" id="Transmissie_Naams">
                                <option value="">--- Kies een transmissie ---</option>
                                <?php echo $data['recordsTransmissie'] ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="Auto_Nummer">Auto_Nummer:</label>
                            <input type="text" name="Auto_Nummer" id="Auto_Nummer">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="Beschikbaar">Beschikbaar:</label>
                            <input type="text" name="Beschikbaar" id="Beschikbaar">
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