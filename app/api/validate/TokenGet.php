<?php
/**
 * User: Andy
 * Date: 2019/7/20
 * Time: 15:49
 */

namespace app\api\validate;


class TokenGet extends BaseValidate
{
    public $rule = [
        'code' => 'require|isNotEmpty'
    ];

    public $message = [
        'code.isNotEmpty' => 'code数据不合法，code为非空字符串',
    ];
}