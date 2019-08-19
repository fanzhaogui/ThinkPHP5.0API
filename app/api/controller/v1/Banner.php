<?php
/**
 * User: Andy
 * Date: 2019/7/19
 * Time: 21:37
 */

namespace app\api\controller\v1;

use app\api\model\Banner as BannerModel;
use app\api\validate\BannerValidate;
use app\api\validate\IDMustBePositiveInt;
use app\lib\exception\BannerMissException;

class Banner
{

    /**
     * 通过ID获取轮播图
     *
     * @param $id
     *
     * @url api/:version/banner/1
     * @return \think\response\Json
     */
    public function getBanner($id)
    {
        (new IDMustBePositiveInt())->goCheck();
        $banner = BannerModel::getOne($id);
        if (!$banner) {
            throw new BannerMissException();
        }
        return $banner;
    }


    /**
     * 获取所有可用的轮播图
     *
     * @url api/:version/banner/all
     */
    public function getBannerAll()
    {
        $ids = input("get.ids");
        (new BannerValidate())->goCheck();
        $banners = BannerModel::where([
                'id' => ['in', $ids]
            ])
            ->select();
        if (!$banners) {
            throw new BannerMissException();
        }
        return $banners;
    }
}