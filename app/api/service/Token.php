<?php
/**
 * User: Andy
 * Date: 2019/7/19
 * Time: 21:42
 */

namespace app\api\service;


class Token extends BaseService
{

    /**
     * 生成32位长度的token字符串
     *
     * @return string
     */
    public static function generateToken()
    {
        $randChars = self::getRandChar(32);
        $timestamp = $_SERVER['REQUEST_TIME'];
        $salt = config('secure.token_salt');
        return md5($randChars . $timestamp . $salt);
    }
}