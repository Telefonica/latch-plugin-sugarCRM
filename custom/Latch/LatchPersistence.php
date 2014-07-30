<?php

/*
  Latch SugarCRM plugin - Integrates Latch into the SugarCRM authentication process.
  Copyright (C) 2013 Eleven Paths

  This library is free software; you can redistribute it and/or
  modify it under the terms of the GNU Lesser General Public
  License as published by the Free Software Foundation; either
  version 2.1 of the License, or (at your option) any later version.

  This library is distributed in the hope that it will be useful,
  but WITHOUT ANY WARRANTY; without even the implied warranty of
  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU
  Lesser General Public License for more details.

  You should have received a copy of the GNU Lesser General Public
  License along with this library; if not, write to the Free Software
  Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301  USA
 */


if (!defined('sugarEntry') || !sugarEntry) {
    die('Not A Valid Entry Point');
}

function pairUser($user_id, $account_id) {

    $sql = "INSERT INTO latch_accounts VALUES ('?','?')";

    $dbToken = $GLOBALS['db']->prepareQuery($sql);

    $params = array($user_id, $account_id);

    $GLOBALS['db']->executePreparedQuery($dbToken, $params);
}

function unpairUser($user_id) {

    $sql = "DELETE FROM latch_accounts WHERE user_id = '?';";

    $params = array($user_id);

    $dbToken = $GLOBALS['db']->prepareQuery($sql);

    $GLOBALS['db']->executePreparedQuery($dbToken, $params);
}

function getAccountIdFromStorage($user_id) {

    $sql = "SELECT account_id FROM latch_accounts WHERE user_id = '?'";

    $params = array($user_id);

    $dbToken = $GLOBALS['db']->prepareQuery($sql);

    $result = $GLOBALS['db']->executePreparedQuery($dbToken, $params);

    $account_id = $GLOBALS['db']->fetchByAssoc($result)['account_id'];

    return $account_id;
}

function setAppSettings($appId, $appSecret) {

    if (ctype_alnum($appId) && strlen($appId) == 20 && ctype_alnum($appSecret) && strlen($appSecret) == 40) {

        $configurator = new Configurator();
        $configurator->config['authenticationClass'] = "LatchAuthenticate";
        $configurator->config['appId'] = $appId;
        $configurator->config['appSecret'] = $appSecret;
        $configurator->handleOverride();
    }
}
