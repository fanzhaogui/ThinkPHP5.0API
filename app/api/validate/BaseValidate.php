<?php
/**
 * User: Andy
 * Date: 2019/7/19
 * Time: 21:43
 */

namespace app\api\validate;


use think\Request;
use think\Validate;
use app\lib\exception\ParameterException;

class BaseValidate extends Validate
{

    /**
     * 全局验证
     *
     * @return bool
     */
    public function goCheck()
    {
        // 获取http传入的参数
        // 对这些参数做验证
        $request = Request::instance();
        $params = $request->param();

        $res = $this->batch()->check($params);
        if (!$res) {
            $error = new ParameterException([
                'msg' => $this->error
            ]);
            throw $error;
        }
        return true;
    }

    /**
     * 正整数验证
     *
     * @param $value
     * @param string $rule
     * @param string $data
     * @param string $field
     *
     * @return bool
     */
    protected function isPositiveInteger($value, $rule = '', $data = '', $field = '')
    {
        if ($value && is_numeric($value) && is_int($value + 0) && ($value + 0) > 0) {
            return true;
        }
        else {
            return false;
        }
    }

    /**
     * 非空验证
     * @param $value
     * @param string $rule
     * @param string $data
     * @param string $field
     *
     * @return bool
     */
    protected function isNotEmpty($value, $rule = '', $data = '', $field = '')
    {
        if (!empty($value)) {
            return true;
        }
        else {
            return false;
        }
    }
}