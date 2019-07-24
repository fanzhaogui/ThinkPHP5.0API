<?php
/**
 * User: Andy
 * Date: 2019/7/24
 * Time: 21:11
 */

namespace app\api\model;


class Image extends Base
{
    protected $hidden = ['id', 'delete_time', 'update_time'];
}