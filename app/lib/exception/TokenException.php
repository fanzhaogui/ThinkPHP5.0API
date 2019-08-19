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
    public $msg = 'Token已过期或无效';
    public $errorCode = 10001;
}