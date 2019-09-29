<?php
/**
 * Created by PhpStorm.
 * User: fanzhaogui
 * Date: 2019/9/29
 * Time: 13:58
 */

namespace tests;


class IndexTest extends TestCase
{
    public function testTest()
    {
        $this->visit('/index/index/test')->see('hello world!');
    }

    public function testForm()
    {
        $this->visit('/index/index/index') // 通过URL访问，获取form表单
            ->submitForm( // 模拟提交的内容
                'submit',
                [
                    'test' => 'test',
                ]
            )
            ->see('hello'); // 断言： 出现的结果和see函数第一个参数填写的内容做对比
    }
}