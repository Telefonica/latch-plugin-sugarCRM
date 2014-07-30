<?php

class LatchViewList extends SugarView {

    function LatchViewList() {
        parent::SugarView();
    }

    function display() {
        global $sugar_config;
        if (isset($_POST['appId']) && isset($_POST['appSecret'])){
            setAppSettings($_POST['appId'], $_POST['appSecret']);
            $appId = $_POST['appId'];
            $appSecret = $_POST['appSecret'];
        } else{
            $appId = isset($sugar_config["appId"]) ? $sugar_config["appId"] : "";
            $appSecret = isset($sugar_config["appSecret"]) ? $sugar_config["appSecret"] : "";
        }
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
            </p>
            <p><button>Save</button></p>
        </form>
        <?php
    }

}
