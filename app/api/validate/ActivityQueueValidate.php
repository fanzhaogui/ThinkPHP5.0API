<?php
/**
 * Created by PhpStorm.
 * User: fanzhaogui
 * Date: 2019/8/19
 * Time: 16:21
 */

namespace app\api\validate;


use app\lib\exception\ParameterException;

class ActivityQueueValidate extends BaseValidate
{
    protected $rule = [
        'title' => 'require',
        'queue_start_time' => 'require', // 活动开始时间
    ];

    protected $message = [
        'title.require' => '活动标题不能为空',
        'queue_start_time.require' => '活动开始时间必填',
    ];
}