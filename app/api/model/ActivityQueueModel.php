<?php
/**
 * Created by PhpStorm.
 * User: fanzhaogui
 * Date: 2019/8/22
 * Time: 16:26
 */

namespace app\api\model;


use think\Model;

class ActivityQueueModel extends Model
{
    protected $table = 'ts_activity_queue';
    protected $autoWriteTimestamp = true;

}