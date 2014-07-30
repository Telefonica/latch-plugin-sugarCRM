<?php

class LatchPairingViewList extends SugarView {

    function LatchPairingViewList() {
        parent::SugarView();
    }

    function display() {
        global $sugar_config, $current_user;
        if (isset($_REQUEST ['operation'])) {
            if (isset($_REQUEST ['pairingToken'])) {
                pairLatchAccount($_REQUEST ['pairingToken'], $current_user->id);
            } else if ($_REQUEST ['operation'] == "unpair") {
                unpairLatchAccount($current_user->id);
            }
        }
        $accountId = getAccountIdFromStorage($current_user->id);
        if ($sugar_config['authenticationClass'] == "LatchAuthenticate") {
            ?>
            <form method="POST" action="index.php?module=LatchPairing">
                <div class="group">
                    <h2>Latch Settings</h2>
                    <ul>
                        <?php
                        if (strlen($accountId) == 0 || $accountId == false) {
                            ?>
                            <label for="pairingToken">Latch Pairing Token:</label>
                            <input type="text" name="pairingToken" id="pairingToken" />
                            <input type="hidden" name="operation" value="pair"/>
                            <input type="submit" value="Pair" />
                            <?php
                        } else {
                            ?>
                            <label for="pairingToken">You are already paired with Latch.</label>
                            <input type="hidden" name="operation" value="unpair"/>
                            <input type="submit" value="Unpair" />
                            <?php
                        }
                        ?>
                    </ul>
                </div>
            </form>
            <?php
        }
    }
}
