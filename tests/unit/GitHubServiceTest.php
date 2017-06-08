<?php

class GitHubServiceTest extends \Codeception\Test\Unit
{
    /**
     * @var \UnitTester
     */
    protected $tester;

    /**
     * @var \App\Services\GitHubService
     */
    private $service;

    protected function _before()
    {
        $this->service = new \App\Services\GitHubService();
    }

    protected function _after()
    {
        //
    }

    public function testFetchUser()
    {
        $user = $this->service->fetchUser('jpcaparas');

        $keys = [
            'login',
            'avatar_url',
            'company',
            'bio',
            'location'
        ];

        foreach($keys as $key)
        {
            $this->tester->assertArrayHasKey($key, (array)$user);
        }
    }
}