<?php
/**
 * User: Andy
 * Date: 2019/7/24
 * Time: 20:53
 */

namespace app\api\model;


class Product extends Base
{
    protected $hidden = ['update_time'];

    /**
     * 关联查询
     *
     * @return \think\model\relation\BelongsTo
     */
    public function img()
    {
        return $this->belongsTo('Image', 'img_id','id');
    }


    /**
     * 获取最近上传的商品
     *
     * @param $count
     *
     * @return false|\PDOStatement|string|\think\Collection
     */
    public static function recent($count)
    {
        return self::order('create_time desc')
            ->limit($count)
            ->select();
    }

    /**
     * 获取某个分类下的商品
     *
     * @param $id
     *
     * @return false|\PDOStatement|string|\think\Collection
     */
    public static function getProductsByCategoryID($id)
    {
        return self::where([
            'category_id' => ['=', $id]
        ])
            ->order('create_time asc')
            ->select();
    }
}