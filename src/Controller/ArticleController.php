<?php
declare (strict_types=1);

namespace Controller;

class ArticleController extends \Phalcon\Mvc\Controller {

    use \Controller\ControllerDataTrait;

    /** @var \Service\ApiClient $apiService */
    private $apiService;

    /**
     * Pseudo constructor
     */
    public function initialize() {
        $this->apiService = $this->getDI()->get('Service\ApiClient');
    }

    /**
     * List all articles
     */
    public function listAction() {
        $limit = (int)$this->request->get('limit', null, 2);
        $offset = (int)$this->request->get('offset', null, 0);

        $data = $this->apiService->getArticles($limit, $offset);

        $this->setData(
            [
                '__meta' => [
                    'controller' => 'article',
                    'action' => 'list',
                ],
                'articles' => $data['data'],
                'paginator' => $data['meta']['paginator'],
            ]
        );

        $html = $this->view->render('index');
        $this->response->setContent($html);
    }

    /**
     * Read article
     */
    public function readAction() {
        $articleId = (int)$this->dispatcher->getParam('id');

        $article = $this->apiService->getArticle($articleId)['data'];
        $this->setData(
            [
                '__meta' => [
                    'controller' => 'article',
                    'action' => 'read',
                ],
                'article' => $article,
            ]
        );

        $html = $this->view->render('index');
        $this->response->setContent($html);
    }
}