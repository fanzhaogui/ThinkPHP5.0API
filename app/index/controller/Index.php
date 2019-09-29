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
        return <<<html
		<html>
		<body>
			<form method="get" action="testForm">
				<input type="text" name='test' value="123">
				<input type="submit" value="submit">
			</form>
		</body>
		</html>
html;

        //return json([123]);
    }

    public function testForm()
    {
        return 'hello';
    }

    public function test()
    {
        return 'hello world!';
    }
}