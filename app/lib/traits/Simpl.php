<?php
/**
 * Created by PhpStorm.
 * User: fanzhaogui
 * Date: 2020/9/25
 * Time: 14:56
 */

namespace app\lib\traits;

/**
 * 单列的共用部分
 *
 * @package app\lib\traits
 */
trait Singleton
{
    private static $instance;

    static function getInstance(...$args)
    {
        if(!isset(self::$instance)){
            self::$instance = new static(...$args);
        }
        return self::$instance;
    }
}