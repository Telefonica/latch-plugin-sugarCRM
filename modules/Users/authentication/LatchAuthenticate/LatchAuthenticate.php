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

require_once('modules/Users/authentication/SugarAuthenticate/SugarAuthenticate.php');

class LatchAuthenticate extends SugarAuthenticate {

    var $userAuthenticateClass = 'LatchAuthenticateUser';
    var $authenticationDir = 'LatchAuthenticate';

    function LatchAuthenticate() {
        parent::SugarAuthenticate();
    }

}
