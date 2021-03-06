<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2018 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

use think\Route;

//Route::get('api/:version/banner/:id', 'api/:version.Banner/getBanner'); // 设定参数为整形，同时强制路由开启，否则 banner/all无法匹配
Route::get('api/:version/banner/:id', 'api/:version.Banner/getBanner', [], ['id'=>'\d+']);

Route::get('api/:version/banner/all', 'api/:version.Banner/getBannerAll');


Route::get('api/:version/token/user', 'api/:version.Token/getToken');


Route::get('api/:version/category/list', 'api/:version.Category/getCateList');


Route::get('api/:version/productrecent/:count', 'api/:version.Product/getRecent');

Route::get('api/:version/categoryproduct/:id', 'api/:version.Product/getAllInCategory', [], ['id'=>'\d+']);


// 接龙
Route::post('api/:version/activity/queue', 'api/:version.ActivityQueue/newOne');
Route::get('api/:version/activity/info/:id', 'api/:version.ActivityQueue/getQueueInfo', [], ['id'=>'\d+']);


// 测试
Route::get('index/index/index', 'index/Index/index');
Route::get('index/index/test', 'index/Index/test');
Route::get('index/index/testForm', 'index/Index/testForm');