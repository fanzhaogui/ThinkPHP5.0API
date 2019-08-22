<?php
/**
 * User: Andy
 * Date: 2019/7/19
 * Time: 21:42
 */

namespace app\api\service;


use app\lib\exception\TokenException;

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

    public static function getUserInfoByToken()
    {
        $token = request()->header('token');
        if (!$token) {
            throw new TokenException([
                'msg' => '获取token失败或未传递token'
            ]);
        }

        $cacheValue = cache($token);
        if (!$cacheValue) {
            throw new TokenException([
                'msg' => '通过token获取缓存信息失败'
            ]);
        }

        return json_decode($cacheValue);
    }


    public static function getCurrentUid()
    {
        $user = self::getUserInfoByToken();
        return $user['user_id'];
    }
}