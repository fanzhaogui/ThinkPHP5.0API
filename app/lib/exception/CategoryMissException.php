<?php
/**
 * User: Andy
 * Date: 2019/7/19
 * Time: 22:46
 */

namespace app\lib\exception;


class CategoryMissException extends BaseException
{
    public $code = '401';
    public $msg = '找不到分类数据';
    public $errorCode = 10003;
}