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


$user = isset($_POST['user_name']) ? $_POST['user_name'] : "";

$password = isset($_POST['user_password']) ? $_POST['user_password'] : "";
?>
<html>
    <head>
        <title>One Time Password</title>
        <style>
            .twoFactorContainer {
                display: block;
                width: 300px;
                margin: 5% auto 0 auto;
                text-align: center;
                border: solid 1px rgb(184, 184, 184);
                border-radius: 5px
            }

            .twoFactorHeader {
                float: left;
                background: #00b9be;
                color: #FFF;
                width: 100%;
                border-top-left-radius: 5px;
                border-top-right-radius: 5px;
                font-family: sans-serif;
            }

            .twoFactorHeader img {
                width: 45px;
                height: auto;
                float: left;
                margin-top: 5px;
                margin-left: 20px
            }

            .twoFactorHeader h3 {
                float: left;
                margin-left: 10px;
            }

            .twoFactorForm {
                clear: left;
                padding-top: 10px;
            }

            input {
                margin-top: 10px
            }

            input[type="submit"] {
                width: 65px;
            }
        </style>
    </head>
    <body>
        <div class="twoFactorContainer">
            <div class="twoFactorHeader">
                <img src="<?php echo ("custom/Latch/images/symbol.png") ?>" alt="Latch logo"/>
                <h3>One-time password</h3>
            </div>
            <div class = "twoFactorForm">
                <form method = "POST">
                    <label>Insert your one-time password:</label>
                    <input type = "text" name = "otp" id = "latchTwoFactor" />
                    <input type = "hidden" value = "<?php echo htmlentities($user) ?>" name = "user_name" />
                    <input type = "hidden" value = "<?php echo htmlentities($password) ?>" name = "user_password" />
                    <input type = "hidden" name="module" value="Users">
                    <input type = "hidden" name="action" value="Authenticate">
                    <input type = "hidden" name="return_module" value="Users">
                    <input type = "hidden" name="return_action" value="Login">
                    <input type = "hidden" id="cant_login" name="cant_login" value="">
                    <button type = "submit" name = "Submit">Submit</button>
                </form>
            </div>
        </div>
    </body>
</html>

<?php
session_write_close();
