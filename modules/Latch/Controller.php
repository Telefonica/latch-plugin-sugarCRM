<?php

require_once('custom/Latch/LatchWrapper.php');

class LatchController extends SugarController {

    function LatchController() {
        parent::SugarController();
    }

    function action_listview() {
        $this->view = 'list';
        return true;
    }

}
