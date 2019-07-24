<?php
/**
 * User: Andy
 * Date: 2019/7/24
 * Time: 23:38
 */

namespace app\lib\exception;


class ResultMissException extends BaseException
{
    public $code = '401';
    public $msg = '查找的内容不存在';
    public $errorCode = 10002;
}