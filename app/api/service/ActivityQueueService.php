<?php
/**
 * Created by PhpStorm.
 * User: fanzhaogui
 * Date: 2019/8/22
 * Time: 16:31
 */

namespace app\api\service;


use app\api\model\ActivityQueueModel;
use app\lib\exception\ActivityException;
use think\Db;

class ActivityQueueService extends BaseService
{
    // 生成一条新的接龙信息
    public static function generateNew ($uid, $params)
    {
        Db::startTrans();
        try {
            $aq = new ActivityQueueModel();
            $aq->founder_user_id = $uid;
            $aq->title = $params['title'];
            $aq->remark = $params['remark'];
            $aq->free = $params['free'];
            $aq->free_desc = $params['free_desc'];
            $aq->longitude = $params['longitude'];
            $aq->latitude = $params['latitude'];
            $aq->address_supplement = $params['address_supplement'];
            $aq->dead_time = $params['dead_time'];
            $aq->queue_start_time = $params['queue_start_time'];
            $aq->queue_end_time = $params['queue_end_time'];
            $aq->less_mumber = $params['less_mumber'];
            $aq->large_mumber = $params['large_mumber'];
            $aq->address = $params['address'];
            $aq->time = $params['large_mumber'];
            $aq->date = $params['large_mumber'];
            $aq->save();

            Db::commit();
            $aqid = $aq->id;

        } catch (\Exception $e) {
            Db::rollback();
            throw new ActivityException();
        }
        return $aqid;
    }
}