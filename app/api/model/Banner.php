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

    /**
     * 通过主键Id获取轮播图
     * @param $id
     *
     * @return array|false|\PDOStatement|string|\think\Model
     */
    public static function getOne($id)
    {
        $banner = self::find($id);
        return $banner;
    }
}