<?php

require_once('controllers/BaseController.php');

class WorksController extends BaseController
{
    private $worksService;

    public function __construct(
        WorksService $worksService
    ) {
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

    function add()
    {
        $this->render('works', 'add', []);
    }

    function create()
    {
        if ($this->worksService->addWork($_POST)) {
            header("Location: /works");
        } else {
            header("Location: /works/add");
        }
    }

    function edit()
    {
        $id = explode('/', $_GET['url'])[2] ?? null;
        if (empty($id)) {
            header("Location: /works");
        }

        $work = $this->worksService->findById($id);

        if (empty($work)) {
            header("Location: /works");
        }

        $this->render('works', 'edit', [$work]);
    }

    function update() {
        $this->worksService->updateById($_POST);
        header("Location: /works");
    }

    function delete() {
        $this->worksService->deleteById($_POST);
        header("Location: /works");
    }
}
