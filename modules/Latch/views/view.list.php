<?php

class LatchViewList extends SugarView {

    function LatchViewList() {
        parent::SugarView();
    }

    function display() {
        global $sugar_config;
        if (isset($_POST['appId']) && isset($_POST['appSecret']) && isset($_POST['csrfToken']) && isset($_SESSION['csrf_token']) &&
			$_SESSION['csrf_token'] == $_POST['csrfToken']){
            setAppSettings($_POST['appId'], $_POST['appSecret']);
        }
		$appId = isset($sugar_config["appId"]) ? $sugar_config["appId"] : "";
		$appSecret = isset($sugar_config["appSecret"]) ? $sugar_config["appSecret"] : "";
		$csrfToken = sha1(rand());
		$_SESSION['csrf_token'] = $csrfToken;
        ?>
        <form method="POST" action="./index.php?module=Latch">
            <h1>Latch Settings </h1>
            <p>
                <label><strong>Application Id</strong></label>
                <input type="text" name="appId" id="appId" maxlength="20" value="<?php echo htmlentities($appId) ?>">
            </p>

            <p>
                <label><strong>Application Secret</strong></label>
                <input type="text" name="appSecret" id="appSecret" maxlength="40" value="<?php echo htmlentities($appSecret) ?>">
				<input type="hidden" name="csrfToken" id="csrfToken" value="<?php echo htmlentities($csrfToken) ?>">
            </p>
            <p><button>Save</button></p>
        </form>
        <?php
    }

}
