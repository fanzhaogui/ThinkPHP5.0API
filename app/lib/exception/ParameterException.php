<?php
/**
 * User: Andy
 * Date: 2019/7/19
 * Time: 22:37
 */

namespace app\lib\exception;


class ParameterException extends BaseException
{
    public $code = 400;
    public $msg = '参数异常';
    public $errorCode = 10000;
}