<?php
declare (strict_types=1);

namespace Controller;

class StatusController extends \Phalcon\Mvc\Controller {

    public function indexAction() {
        $this->view->setRenderLevel(1);
    }
}