<?php
/**
 * User: Andy
 * Date: 2019/7/19
 * Time: 22:46
 */

namespace app\lib\exception;


class BannerMissException extends BaseException
{
    public $code = '401';
    public $msg = '找不到此banner';
    public $errorCode = 10002;
}