<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ExampleTest extends TestCase
{
    /**
     * A basic functional test example.
     *
     * @return void
     */
    public function testBasicExample()
    {
        //$this->visit('/')->see('Laravel 5');
        $this->assertTrue(true);
    }


    public function testHome(){

        //visit 方法会创建一个 GET 请求，see 方法则断言在返回的响应中会有指定的文本
        $this->visit('/')->see('首页')->dontSee('啦啦啦');;
    }
}
