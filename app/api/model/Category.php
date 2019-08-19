<?php
/**
 * User: Andy
 * Date: 2019/7/24
 * Time: 21:06
 */

namespace app\api\model;


class Category extends Base
{
    protected $hidden = ['update_time', 'delete_time'];

    /**
     * 关联模型
     * @return \think\model\relation\BelongsTo
     */
    public function imgUrl ()
    {
        return $this->belongsTo('Image', 'topic_img_id', 'id');
    }

    /**
     * 分类
     *
     * @return false|static[]
     */
    public static function categories()
    {
        $res =  self::all([], 'imgUrl');
        return $res;
    }
}