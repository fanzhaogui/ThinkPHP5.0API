<?php
/**
 * User: Andy
 * Date: 2019/7/19
 * Time: 21:37
 */

namespace app\api\controller\v1;

use app\api\model\Banner as BannerModel;
use app\api\validate\IDMustBePositiveInt;
use app\lib\exception\BannerMissException;

class Banner
{

    /**
     * 获取轮播图
     *
     * @param $id
     *
     * @return \think\response\Json
     */
    public function getBanner($id)
    {
        (new IDMustBePositiveInt())->goCheck();
        $banner = BannerModel::getOne($id);
        if (!$banner) {
            throw new BannerMissException();
        }
        return json($banner);
    }
}