<?php

$manifest = array(
    'acceptable_sugar_versions' => array(
        "5\.*\.*",
        "6\.*\.*",
    ),
    'acceptable_sugar_flavors' =>
    array(
        'CE', 'PRO', 'ENT'
    ),
    'is_uninstallable' => true,
    'name' => 'Latch Authentication module 1.0',
    'description' => 'ElevenPaths Latch authentication plugin',
    'author' => 'ElevenPaths',
    'published_date' => '28/07/14',
    'version' => '1.0',
    'type' => 'module',
    'icon' => '',
);
$installdefs = array(
    
    'id' => 'LatchAuthentication',
    'copy' => array(
        0 =>
        array(
            'from' => '<basepath>/modules/',
            'to' => 'modules/',
        ),
        1 =>
        array(
            'from' => '<basepath>/custom/',
            'to' => 'custom/',
        ),
    ),
    'pre_execute' => array(
        0 => '<basepath>/pre_install_actions.php',
    ),
    'pre_uninstall' => array(
        0 => '<basepath>/pre_uninstall_actions.php',
    ),
);
?>