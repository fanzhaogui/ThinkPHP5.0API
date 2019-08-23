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
            $aq->title = self::getCurrentIndexValue($params, 'title', '');
            $aq->remark = self::getCurrentIndexValue($params, 'remark', '');
            $aq->free = self::getCurrentIndexValue($params, 'free', 0);
            $aq->free_desc = self::getCurrentIndexValue($params, 'free_desc', '');
            $aq->longitude = self::getCurrentIndexValue($params, 'longitude', '');
            $aq->latitude = self::getCurrentIndexValue($params, 'latitude', '');
            $aq->address_supplement = self::getCurrentIndexValue($params, 'address_supplement', '');
            $aq->less_mumber = self::getCurrentIndexValue($params, 'less_mumber', 0);
            $aq->large_mumber = self::getCurrentIndexValue($params, 'large_mumber', 0);
            $aq->address = self::getCurrentIndexValue($params, 'address', '');
            // 时间需要处理一下
            $aq->dead_time = self::getTimeFormat(self::getCurrentIndexValue($params, 'dead_time', 0));
            $aq->queue_start_time = self::getTimeFormat(self::getCurrentIndexValue($params, 'queue_start_time', 0));
            $aq->queue_end_time = self::getTimeFormat(self::getCurrentIndexValue($params, 'queue_end_time', 0));
            // 开始时间的日期 20190831 和 时分秒 10:30:59
            $aq->time = date("H:i:s", $aq->queue_start_time);
            $aq->date = date("Ymd", $aq->queue_start_time);
            $aq->save();

            Db::commit();
            $aqid = $aq->id;

        } catch (\Exception $e) {
            Db::rollback();
            throw $e;
        }
        return $aqid;
    }

    public static function getInfoById($id)
    {
        $data = ActivityQueueModel::find($id)->toArray();
        if (empty($data)) {
            throw new ActivityException();
        }

        $data['queue_start_time']   = self::getFormatTimeStamp($data['queue_start_time']);
        $data['queue_end_time']     = self::getFormatTimeStamp($data['queue_end_time']);

        return $data;
    }

    // 2019/08/31 18:30 -转- 1456789323
    // 当为 0或空字符串时，直接返回
    private static function getTimeFormat($timestamp)
    {
        if (empty($timestamp)) {
            return $timestamp;
        }
        return strtotime($timestamp);
    }

    // 1456789323 -转- 2019/08/31 18:30
    // 当为 0或空字符串时，直接返回
    private static function getFormatTimeStamp($time)
    {
        if (empty($time)) {
            return $time;
        }
        return date("Y/m/d H:i", $time);
    }
}