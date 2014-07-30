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

require_once('modules/Users/authentication/SugarAuthenticate/SugarAuthenticateUser.php');

class LatchAuthenticateUser extends SugarAuthenticateUser {

    function loadUserOnSession($user_id) {

        global $current_user;

        require_once('custom/Latch/LatchWrapper.php');

        if (empty($user_id)) {
            return false;
        }

        if (isset($_POST['otp']) && isset($_SESSION['otp'])) {
            if ($_POST['otp'] == $_SESSION['otp']) {
                $_SESSION['logged_in'] = true;
                return parent::loadUserOnSession($user_id);
            } else {
                return header("Location: ./index.php?module=Users&action=logout");
            }
        }

        if (!(isset($_SESSION['logged_in']) && $_SESSION['logged_in'])) {

            $accountId = getAccountIdFromStorage($user_id);

            if ($accountId && isset($_REQUEST['action']) && strtolower($_REQUEST['action']) != "logout") {
                $status = getLatchStatus($accountId);

                if ($status != null) {
                    if ($status['accountBlocked']) {
                        header("Location: ./index.php?module=Users&action=logout");
						exit;
                    } else if (isset($status['twoFactor'])) {
                        $_SESSION['otp'] = $status['twoFactor'];
                        include_once("custom/Latch/secondFactorForm.php");
                        die();
                    }
                }
            }
        }
        $_SESSION['logged_in'] = true;

        return parent::loadUserOnSession($user_id);
    }
}
