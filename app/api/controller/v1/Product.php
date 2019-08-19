<?php
/**
 * User: Andy
 * Date: 2019/7/24
 * Time: 20:51
 */

namespace app\api\controller\v1;

use app\api\model\Product as ProductModel;
use app\api\validate\Count;
use app\api\validate\IDMustBePositiveInt;
use app\lib\exception\ResultMissException;


class Product
{

    public function getRecent($count = 15)
    {
        (new Count())->goCheck();
        $pros = ProductModel::recent($count);

        if (!$pros) {
            throw new ResultMissException([
                'msg' => '产品不存在'
            ]);
        }

        return $pros;
    }

    public function getAllInCategory($id)
    {
        (new IDMustBePositiveInt())->goCheck();
        $list = ProductModel::getProductsByCategoryID($id);
        if (!$list) {
            throw new ResultMissException([
                'msg' => '产品不存在'
            ]);
        }
        return $list;
    }
}