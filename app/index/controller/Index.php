<?php
/**
 * User: Andy
 * Date: 2019/7/19
 * Time: 23:17
 */

namespace app\index\controller;


use think\Controller;

class Index
{
    public function index ()
    {
        return json([123]);
    }
}