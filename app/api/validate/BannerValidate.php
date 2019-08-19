<?php
/**
 * Created by PhpStorm.
 * User: fanzhaogui
 * Date: 2019/8/19
 * Time: 16:21
 */

namespace app\api\validate;


use app\lib\exception\ParameterException;

class BannerValidate extends BaseValidate
{
    protected $rule = [
        'ids' => 'require|isIntegetString',
    ];

    protected $message = [
        'ids.isIntegetString' => '参数错误',
    ];

    public $spRule = [
        'id' => 'require|isPositiveInteger'
    ];

    // 字符串的IDs
    protected function isIntegetString($value)
    {
        if (empty(trim($value, ','))) {
            throw new ParameterException([
                'msg' => '传递的参数不合法',
            ]);
        }

        $ids = explode(',', $value);
        if (!is_array($ids)) {
            throw new ParameterException();
        }

        for ($i = 0; $i < count($ids); $i++) {
            $this->checkSingleId($ids[$i]);
        }

        return true;
    }

    // 检查单个Banner的ID值是否正确
    protected function checkSingleId($value)
    {
        $validate = new BaseValidate($this->spRule);
        if (!$validate->check($value)) {
            throw new ParameterException([
                'msg' => '传递的ID不为正整形',
            ]);
            return false;
        }
        return true;
    }
}