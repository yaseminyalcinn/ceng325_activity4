<!DOCTYPE html>
<html lang="en">
<head>
    <title>Java Jam Coffee House</title>
    <meta name="description" content="CENG 311 Inclass Activity 1" />
</head>
<body>
    <form action="KavakYalcin-activity4.php" method="GET">
    <?php
$conversionRates = array(
    "US Dollar_Canadian Dollar" => 1.35,
    "US Dollar_Euro" => 0.92,
    "Canadian Dollar_US Dollar" => 0.74,
    "Canadian Dollar_Euro" => 0.68,
    "Euro_US Dollar" => 1.09,
    "Euro_Canadian Dollar" => 1.47,
    "Euro_Euro" => 1,
    "Canadian Dollar_Canadian Dollar" => 1,
    "US Dollar_US Dollar" => 1,
);

$convertedAmount = '';
if (isset($_GET['convert'])) {
    $fromCurrency = $_GET['from_currency'];
    $toCurrency = $_GET['to_currency'];
    $amount = floatval($_GET['from_value']);
    $conversionKey = $fromCurrency . "_" . $toCurrency;

    if (isset($conversionRates[$conversionKey])) {
        $convertedAmount = $amount * $conversionRates[$conversionKey];
    }
}
?>
        <table>
            <tr>
                <td>From:</td>
                <td><input type="text" name="from_value" value="<?php echo isset($_GET['from_value']) ? htmlspecialchars($_GET['from_value']) : ''; ?>"/></td>
                <td>Currency:</td>
                <td>
                    <select name="from_currency">
                        <option value="US Dollar" <?php echo (isset($_GET['from_currency']) && $_GET['from_currency'] == 'US Dollar') ? 'selected' : ''; ?>>US Dollar</option>
                        <option value="Canadian Dollar" <?php echo (isset($_GET['from_currency']) && $_GET['from_currency'] == 'Canadian Dollar') ? 'selected' : ''; ?>>Canadian Dollar</option>
                        <option value="Euro" <?php echo (isset($_GET['from_currency']) && $_GET['from_currency'] == 'Euro') ? 'selected' : ''; ?>>Euro</option>
                    </select>
                </td>   
            </tr>
            <tr>
                <td>To :</td>
                <td><input type="text" name="to_value" readonly value="<?php echo $convertedAmount !== '' ? htmlspecialchars(number_format($convertedAmount, 2)) : ''; ?>"/></td>
                <td>Currency:</td>
                <td>
                    <select name="to_currency">
                        <option value="Canadian Dollar" <?php echo (isset($_GET['to_currency']) && $_GET['to_currency'] == 'Canadian Dollar') ? 'selected' : ''; ?>>Canadian Dollar</option>
                        <option value="Euro" <?php echo (isset($_GET['to_currency']) && $_GET['to_currency'] == 'Euro') ? 'selected' : ''; ?>>Euro</option>
                        <option value="US Dollar" <?php echo (isset($_GET['to_currency']) && $_GET['to_currency'] == 'US Dollar') ? 'selected' : ''; ?>>US Dollar</option>
                    </select>
                </td>   
            </tr>
            <tr>
                <td colspan="4" style="text-align: right;"><input type="submit" name="convert" value="Convert"/></td>   
            </tr>
        </table>
    </form>
</body>
</html>
