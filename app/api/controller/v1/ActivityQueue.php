<?php
/**
 * Created by PhpStorm.
 * User: fanzhaogui
 * Date: 2019/8/22
 * Time: 16:20
 */

namespace app\api\controller\v1;


use app\api\model\ActivityJoinner;
use app\api\service\ActivityJoinnerService;
use app\api\service\ActivityQueueService;
use app\api\service\Token;
use app\api\validate\ActivityJoinValidate;
use app\api\validate\ActivityQueueValidate;
use app\api\controller\BaseController;
use app\api\validate\IDMustBePositiveInt;

// 接龙
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

    // 获取活动信息及参与用户列表
    public function getQueueInfo($id)
    {
        (new IDMustBePositiveInt())->goCheck();
        // 活动ID 获取活动信息
        $data = ActivityQueueService::getInfoById($id);

        // 活动参与者的信息 ts_activity_joinner
        $list = ActivityJoinnerService::joinnerList($id);

        return compact('data', 'list');
    }

    // 报名：参与活动
    public function join()
    {
        (new ActivityJoinValidate())->goCheck();
        $uid = Token::getCurrentUid();
        $ret = ActivityJoinnerService::joinAct($uid, input('post.'));
        return $ret;
    }
}