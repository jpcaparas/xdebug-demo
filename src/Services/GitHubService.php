<?php

namespace App\Services;

use App\Exceptions\GitHubServiceException;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;

class GitHubService
{
    const API_URL = 'https://api.github.com/users';

    protected $client;

    protected $lastResponse;

    public function __construct()
    {
        $this->client = new Client();
    }

    /**
     * Fetch GitHub user
     *
     * @param string $username
     *
     * @return array
     *
     * @throws GitHubServiceException
     */
    public function fetchUser($username)
    {
        if (empty($username) === true) {
            throw new GitHubServiceException('Specify username.');
        }

        $res = $this->client->request('GET', self::API_URL . '/' . $username);

        if ($res->getStatusCode() !== 200) {
            throw new GitHubServiceException('User not found.');
        }

        $body = (string)$res->getBody();

        return \GuzzleHttp\json_decode($body);
    }
}