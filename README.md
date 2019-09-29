## 注意

全局异常处理配置

自定义处理异常信息

## phpunit安装使用  及 tp5.0单元测试
**本项目使用phpunit前，修改config配置的：default_return_type，url_route_must**

> phpunit安装 https://phpunit.de

> tp5测试文档：杂项

> tp5测试文档：https://www.kancloud.cn/code7/tpunit

1. composer下载package

    tp5.0 + phpunit : 指定版本
    5.0* ： composer require topthink/think-testing v1.*
    5.1* ： composer require topthink/think-testing v2.*
    
2. 修改命令行的项目目录

    文件位置：  /think 
    修改内容： define('APP_APATH', __DIR__ . '/app/'); // 将application改名的情况下
    
    文件位置：/tests/TestCase.php
    修改内容：$baseUrl = 'web.myone.com'; 
    如果通过localhost能直接访问，就不用修改
    如果配置设置了强制路由的，必要时需要设定可以访问的路由

3. 运行测试代码

    $: php think unit

4. dbunit

    composer.json 文件，新增项
    "require_dev": {
        "phpunit/dbunit": ">=1.2"
    },
    $: composer update
~~~