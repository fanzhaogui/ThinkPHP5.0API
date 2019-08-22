<?php
/**
 * Created by PhpStorm.
 * User: fanzhaogui
 * Date: 2019/8/22
 * Time: 16:20
 */

namespace app\api\controller;


use app\api\service\ActivityQueueService;
use app\api\service\Token;
use app\api\validate\ActivityQueueValidate;

class ActivityQueue extends BaseController
{
    /**
     * 创建一个新的接龙活动
     */
    public function newOne()
    {
        (new ActivityQueueValidate())->goCheck();
        $uid = Token::getCurrentUid();
        $res = ActivityQueueService::generateNew($uid, input('post.'));

        return [
            'act_id' => $res,
        ];
    }
}