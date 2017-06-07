<?php

namespace App\Controllers;

use Slim\Container;
use Slim\Http\Request;
use Slim\Http\Response;
use Slim\Views\Twig;
use Symfony\Component\Console\Exception\LogicException;

class BaseController
{
    /**
     * @var Container
     */
    protected $container;

    /**
     * @var Request
     */
    protected $request;

    /**
     * @var Response
     */
    protected $response;

    /**
     * @var array
     */
    protected $args;

    /**
     * @var string
     */
    protected $viewFile;

    /**
     * BaseController constructor.
     *
     * @param $container
     */
    public function __construct($container)
    {
        $this->setContainer($container);
    }

    /**
     * @param Request $request
     * @param Response $response
     * @param array $args
     *
     * @return mixed
     */
    public function __invoke($request, $response, $args)
    {
        $this->request = $request;
        $this->response = $response;

        return $this->render();
    }

    /**
     * @param Container $container
     */
    public function setContainer($container)
    {
        $this->container = $container;
    }

    /**
     * @return mixed
     *
     * @throws LogicException
     */
    public function render()
    {
        if (is_null($this->viewFile) === true) {
            throw new \LogicException('the viewFile property must be set.');
        }

        return $this->container->view->render($this->response, $this->viewFile);
    }
}