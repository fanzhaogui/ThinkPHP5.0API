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

Route::get('api/:version/banner/:id', 'api/:version.Banner/getBanner', [], ['id'=>'\d+']);


Route::get('api/:version/token/user', 'api/:version.Token/getToken');


Route::get('api/:version/category/list', 'api/:version.Category/getCateList');


Route::get('api/:version/productrecent/:count', 'api/:version.Product/getRecent');

Route::get('api/:version/categoryproduct/:id', 'api/:version.Product/getAllInCategory');
