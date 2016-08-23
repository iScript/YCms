<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ApiTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testTest()
    {
        //echo "开始测试testTest";
        $this->get('/test')->seeJson(['created' => true,]);
        $this->assertResponseOk();
        $this->seeHeader('Content-Type', 'application/json');
    }


    public function testTest2()
    {
        //$response = $this->call($method, $uri, $parameters, $cookies, $files, $server, $content);
        //$response = $this->call('GET', 'test');

        //$this->assertEquals('created', $response->getContent());
    }






}
