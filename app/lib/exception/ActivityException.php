<?php
/**
 * User: Andy
 * Date: 2019/7/19
 * Time: 22:46
 */

namespace app\lib\exception;


class ActivityException extends BaseException
{
    public $code = '401';
    public $msg = '活动创建失败';
    public $errorCode = 40001;
}