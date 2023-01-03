<?php

require_once('controllers/BaseController.php');

class WorksController extends BaseController
{
    private $worksService;

    public function __construct(WorksService $worksService)
    {
        $this->worksService = $worksService;
    }

    function index()
    {
        $isAjax = 'xmlhttprequest' == strtolower( $_SERVER['HTTP_X_REQUESTED_WITH'] ?? '' );
        if ($isAjax) {
            echo $this->jsonResponse(200, $this->worksService->getAll(), '');
        } else {
            $this->render('works', 'index', []);
        }
    }
}
