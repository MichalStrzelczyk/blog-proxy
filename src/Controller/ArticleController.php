<?php
declare (strict_types=1);

namespace Controller;

class ArticleController extends \Phalcon\Mvc\Controller {
    /** @var \Service\ApiClient $apiService */
    private $apiService;

    public function initialize() {
        $this->apiService = $this->getDI()->get('Service\ApiClient');
    }

    public function listAction() {
        $limit = (int) $this->request->get('limit', null, 2);
        $offset = (int) $this->request->get('offset', null, 0);

        $data = $this->apiService->getArticles($limit, $offset);
        $this->view->articles = $data['data'];
        $this->view->paginator = $data['meta']['paginator'];

        return $this->view;
    }

    public function readAction() {
        $articleId = (int) $this->dispatcher->getParam('id');
        $this->view->article = $this->apiService->getArticle($articleId)['data'];
    }
}