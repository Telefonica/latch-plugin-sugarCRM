<?php

$admin_option_defs = array();
$admin_option_defs['Administration']['latch'] = array(
    'Administration',
    'Latch Configuration',
    'Latch configuration panel',
    './index.php?module=Latch',
);

$admin_group_header[] = array(
    'Latch',
    '',
    false,
    $admin_option_defs,
    'Latch configuration options'
);
