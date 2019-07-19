<?php
/**
 * User: Andy
 * Date: 2019/7/19
 * Time: 21:41
 */

namespace app\api\model;


class Banner extends Base
{
    protected $hidden = ['update_time', 'delete_time'];


    public static function getOne($id)
    {
        $banner = self::find($id);
        return $banner;
    }
}