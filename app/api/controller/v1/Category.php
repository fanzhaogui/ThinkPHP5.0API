<?php
/**
 * User: Andy
 * Date: 2019/7/24
 * Time: 20:52
 */

namespace app\api\controller\v1;

use app\api\model\Category as CategoryModel;
use app\lib\exception\CategoryMissException;

class Category
{
    /**
     * 获取所有的分类
     *
     * @return false|\PDOStatement|string|\think\Collection
     */
    public function getCateList()
    {
        $cateList = CategoryModel::categories();
        if (!$cateList) {
            throw new CategoryMissException();
        }
        return $cateList;
    }


}