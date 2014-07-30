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

require_once 'Latch.php';
require_once 'LatchResponse.php';
require_once 'Error.php';
require_once 'LatchPersistence.php';

function pairLatchAccount($pairingToken, $user_id) {
    if (ctype_alnum($pairingToken) && strlen($pairingToken) == 6) {
        $api = getLatchAPIConnection();

        if ($api != NULL) {
            $pairingResponseNode = $api->pair($pairingToken);
            if (containsAccountId($pairingResponseNode)) {
                pairUser($user_id, $pairingResponseNode->getData()->{'accountId'});
                return $pairingResponseNode->getData()->{'accountId'};
            }
        }
    }
    return false;
}

function unpairLatchAccount($user_id) {
    if (isset($user_id)) {

        $api = getLatchAPIConnection();
        $accountId = getAccountIdFromStorage($user_id);

        if ($api != NULL && $accountId != null) {
            $pairedCount = unpairUser($user_id, $accountId);

            if ($pairedCount == 0) {
                $api->unpair($accountId);
            }
            return true;
        }
    }
    return false;
}

function containsAccountId($pairingResponse) {
    return $pairingResponse->getData() != NULL && $pairingResponse->getData()->{"accountId"} != NULL;
}

function getLatchStatus($accountId) {
    global $sugar_config;
    $appId = $sugar_config['appId'];
    $api = getLatchAPIConnection();
    if ($api != NULL) {
        $statusResponse = $api->status($accountId);
        if (validateResponseStructure($statusResponse, $appId)) {
            $status = $statusResponse->getData()->{"operations"}->{$appId}->{"status"};
            $returnStatus = array(
                'accountBlocked' => ($status == 'off')
            );
            if (property_exists($statusResponse->getData()->{"operations"}->{$appId}, "two_factor")) {
                $returnStatus ['twoFactor'] = $statusResponse->getData()->{"operations"}->{$appId}->{"two_factor"}->{"token"};
            }
            return $returnStatus;
        }
    }
    return array(
        'accountBlocked' => false
    );
}

function validateResponseStructure($response, $applicationId) {
    $data = $response->getData();
    return $data != NULL && property_exists($data, "operations") && property_exists($data->{"operations"}, $applicationId) && $response->getError() == NULL;
}

function getLatchAPIConnection() {
    global $sugar_config;

    $appId = $sugar_config["appId"];
    $appSecret = $sugar_config["appSecret"];

    if (!empty($appId) && !empty($appSecret)) {
        return new Latch($appId, $appSecret);
    }
    return NULL;
}

?>