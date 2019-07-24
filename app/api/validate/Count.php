<?php
/**
 * User: Andy
 * Date: 2019/7/24
 * Time: 23:32
 */

namespace app\api\validate;



class Count extends BaseValidate
{
    public $rule = [
        'count' => 'isPositiveInteger|between:1,15'
    ];
}