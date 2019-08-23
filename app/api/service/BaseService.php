<?php
/**
 * User: Andy
 * Date: 2019/7/20
 * Time: 15:53
 */

namespace app\api\service;


class BaseService
{

    /**
     * 获取随机字符串
     *
     * @param int $length
     *
     * @return null|string
     */
    public static function getRandChar($length =32)
    {
        $str = NULL;
        $strPol = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz";
        $max = strlen($strPol) - 1;

        for ($i = 0; $i < $length; $i ++) {
            $str .= $strPol[rand(0, $max)];
        }

        return $str;
    }

    /**
     * 获取数组中的指定的键值
     *
     * @param $params
     * @param $index
     * @param string $default
     * @return string
     */
    public static function getCurrentIndexValue($params, $index, $default = '')
    {
        if (is_array($params) && array_key_exists($index, $params) ) {
            return $params[$index];
        }
        return $default;
    }
}