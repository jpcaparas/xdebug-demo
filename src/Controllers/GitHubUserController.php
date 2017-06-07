<?php

namespace App\Controllers;

use App\Exceptions\GitHubServiceException;
use App\Services\GitHubService;
use GuzzleHttp\Exception\ClientException;

class GitHubUserController extends BaseController
{
    protected $viewFile = 'github-user.html.twig';

    /**
     * @return mixed
     */
    public function render()
    {
        $github = new GitHubService();
        $params = $this->request->getParams();

        try {
            $user = $github->fetchUser($params['username']);
        } catch (GitHubServiceException $e) {
            throw new $e;
        }

        return $this->container->view->render($this->response, $this->viewFile, [
            'user' => $user
        ]);
    }
}
