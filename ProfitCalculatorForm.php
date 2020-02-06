<?php
/**
 * File with the form
 *
 * @author Paweł Lodzik <Pawemol12@gmail.com>
 */
?>
<h1>Protipster - Profit Calculator</h1>
<form action="index.php" method="post">
    
Odds: <input type="number" name="odds" step="0.01" value="<?php if(!empty($_POST['odds'])):?><?=$_POST['odds']?><?php endif;?>"><br>
Stake: <input type="number" name="stake" step="0.01" value="<?php if(!empty($_POST['stake'])):?><?=$_POST['stake']?><?php endif;?>"><br>
Tip Status: <select name="tipStatus">
    <?php foreach(CommonPicksProvider::PICKS_LABELS as $pickCode => $label) : ?>
        <option value="<?= $pickCode; ?>" <?php if (isset($_POST['tipStatus']) && $_POST['tipStatus'] == $pickCode): ?>selected<?php endif;?>><?= $label; ?></option>
    <?php endforeach; ?>
</select><br>

<input type="submit" value="Calculate profit/loss">
</form>

<?php 
    if (!empty($_POST['odds']) && !empty($_POST['stake']) && isset($_POST['tipStatus'])) {
        $calculatedValue = ProfitCalculator::calculate((float) $_POST['stake'], (float) $_POST['odds'], (int) $_POST['tipStatus']);
        if ($calculatedValue > 0) {
            echo 'Profit: '.$calculatedValue;
        } else if ($calculatedValue == 0 and (int) $_POST['tipStatus'] == CommonPicksProvider::VOIDED) {
            echo 'Voided - Profit/Loss equals 0';
        } else {
            echo 'Loss: '.$calculatedValue;
        }
    }
?>