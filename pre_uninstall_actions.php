<?php

$sql = "DROP TABLE latch_accounts;";

$GLOBALS['db']->query($sql);

$datas = file('config_override.php');
$file = fopen('config_override.php', 'w');
fputs($file, '');

if (isset($global_control_links['latchPairing'])) {
    unset($global_control_links['latchPairing']);
}

foreach ($datas as $row) {
    $GLOBALS['log']->info("UNINSTALL " . $row);
    if (strpos($row, "LatchAuthenticate") === false && strpos($row, "appId") === false && strpos($row, "appSecret") === false) {
        fputs($file, $row);
    }
}
fclose($file);
?>