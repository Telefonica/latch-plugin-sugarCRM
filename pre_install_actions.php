<?php

require_once 'modules/Configurator/Configurator.php';

$sql = "CREATE TABLE IF NOT EXISTS latch_accounts (user_id VARCHAR(40),account_id VARCHAR(64), PRIMARY KEY (user_id));";
$GLOBALS['db']->query($sql);

$configurator = new Configurator();

$configurator->loadConfig();
$configurator->config['authenticationClass'] = "LatchAuthenticate";
$configurator->saveConfig();
?>