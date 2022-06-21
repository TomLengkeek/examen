<div style="padding-left: 500px;
            margin-top: 75px;">




    <form action="<?= URLROOT; ?>/Autokms/kmInvoeren" method="POST">
        <table>
            <tbody>
                <tr>
                    <td>
                        <label for="kmstand">KM:</label>
                        <input type="text" name="kmstand" id="kmstand" value="<?= $data["row"]->kmstand ?>">
                    </td>
                    <td>
                        <input type="hidden" value="<?= $data["row"]->id ?>">
                    </td>
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