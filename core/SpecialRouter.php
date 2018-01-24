<?php

include_once 'Router.php';

class SpecialRouter extends Router
{
    public function getActionName()
    {
        return ($_POST['action'] ?? 'index') . 'Action';
    }
}