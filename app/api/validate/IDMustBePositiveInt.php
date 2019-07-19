<?php
/**
 * User: Andy
 * Date: 2019/7/19
 * Time: 21:43
 */

namespace app\api\validate;


class IDMustBePositiveInt extends BaseValidate
{
    public $rule = [
        'id' => 'require|isPositiveInteger'
    ];

    public $message = [
        'id.isPositiveInteger' => 'ID必须为大于零的正整数',
    ];
}