<?php

class LatchPairingViewList extends SugarView {

    function LatchPairingViewList() {
        parent::SugarView();
    }

    function display() {
        global $sugar_config, $current_user;
		if (isset($_POST['csrfToken']) && isset($_SESSION['csrf_token']) &&	$_SESSION['csrf_token'] == $_POST['csrfToken']) {		
		    if (isset($_POST['operation']) && $_POST['operation'] == "pair" && isset($_POST ['pairingToken'])) {
				pairLatchAccount($_POST['pairingToken'], $current_user->id);
			} else if (isset($_POST['operation']) && $_POST['operation'] == "unpair") {
				unpairLatchAccount($current_user->id);
			}
		}
		$bytes = openssl_random_pseudo_bytes(20);
		$csrfToken = sha1($bytes);
		$_SESSION['csrf_token'] = $csrfToken;
		      
        if ($sugar_config['authenticationClass'] == "LatchAuthenticate") {
			$accountId = getAccountIdFromStorage($current_user->id);
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
						<input type="hidden" name="csrfToken" id="csrfToken" value="<?php echo htmlentities($csrfToken) ?>">
                    </ul>
                </div>
            </form>
            <?php
        }
    }
}
