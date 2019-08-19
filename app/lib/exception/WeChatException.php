<?php
/**
 * User: Andy
 * Date: 2019/7/20
 * Time: 16:16
 */

namespace app\lib\exception;


class WeChatException extends BaseException
{
    public $code = 404; //HTTP 状态码
    public $msg = '微信内部错误，返回的结果不可用';  // 错误具体信息
    public $errorCode = 40000; // 自定义的错误码
}