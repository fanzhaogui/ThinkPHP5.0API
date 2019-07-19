<?php
/**
 * User: Andy
 * Date: 2019/7/19
 * Time: 21:47
 */

namespace app\lib\exception;


use think\Exception;

class BaseException extends Exception
{
    public $code;
    public $msg;
    public $errorCode;

    public function __construct($params = [])
    {
        if (!is_array($params) || empty($params)) {
            return ;
        }

        if (array_key_exists('code', $params)) {
            $this->code = $params['code'];
        }

        if (array_key_exists('msg', $params)) {
            $this->msg = $params['msg'];
        }

        if (array_key_exists('errorCode', $params)) {
            $this->errorCode = $params['errorCode'];
        }
    }
}