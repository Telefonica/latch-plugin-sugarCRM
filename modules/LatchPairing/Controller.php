<?php

require_once('custom/Latch/LatchWrapper.php');

class LatchPairingController extends SugarController {

    function LatchPairingController() {
        parent::SugarController();
    }

    function action_listview() {
        $this->view = 'list';
        return true;
    }

}
