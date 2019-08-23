<?php
/**
 * Created by PhpStorm.
 * User: fanzhaogui
 * Date: 2019/8/23
 * Time: 14:14
 */

namespace app\api\validate;


class ActivityJoinValidate extends BaseValidate
{
    protected $rule = [
        'act_id' => 'require|isPositiveInteger',
        'nickName' => 'require',
        'telNumber' => 'require',
        'mail' => 'require|email',
    ];
}