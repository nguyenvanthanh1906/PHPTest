<?php

require_once('controllers/BaseController.php');

class PagesController extends BaseController
{
    function error()
    {
        $this->render('pages', 'error', []);
    }
}