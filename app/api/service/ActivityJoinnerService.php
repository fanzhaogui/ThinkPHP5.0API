<?php
/**
 * Created by PhpStorm.
 * User: fanzhaogui
 * Date: 2019/8/23
 * Time: 13:44
 */

namespace app\api\service;


use app\api\model\ActivityJoinner;

class ActivityJoinnerService extends BaseService
{

    public static function joinnerList ($id, $page = 1, $size = 10)
    {
        $list = ActivityJoinner::alias(['ts_activity_joinner' => 'j', 'ts_wxuser' => 'u'])
            ->field('u.avatarUrl, j.*')
            ->join('ts_wxuser u', 'u.user_id = j.user_id')
            ->order('create_time desc')
            ->where(['j.act_id' => $id])
            ->paginate($size, false, ['page' => $page]);
        return $list;
    }

    // 参与活动
    public static function joinAct ($uid, $params)
    {
        $join = new ActivityJoinner();
        $join->startTrans();
        try {
            $join->user_id = $uid;
            $join->act_id = self::getCurrentIndexValue($params, 'act_id');
            $join->nickName = self::getCurrentIndexValue($params, 'nickName');
            $join->telNumber = self::getCurrentIndexValue($params, 'telNumber');
            $join->mail = self::getCurrentIndexValue($params, 'mail');
            $join->save();
            $join->commit();
        } catch (\Exception $e) {
            $join->rollback();
            throw $e;
        }
        return $join->toArray();
    }
}