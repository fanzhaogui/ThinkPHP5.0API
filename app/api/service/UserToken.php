<?php
/**
 * User: Andy
 * Date: 2019/7/20
 * Time: 15:53
 */

namespace app\api\service;


use app\lib\exception\WeChatException;
use think\Exception;
use think\Log;

class UserToken extends BaseService
{
    protected $code;
    protected $wxAppID;
    protected $wxAppSecret;
    protected $wxLoginUrl;

    public function __construct($code)
    {
        $this->code = $code;
        $this->wxAppID = config('wx.app_id');
        $this->wxAppSecret = config('wx.app_secret');
        $this->wxLoginUrl = sprintf(config('wx.login_url'), $this->wxAppID, $this->wxAppSecret, $this->code);
    }

    /**
     * 获取用户信息，同时生成Token
     *
     * @return mixed
     * @throws \think\Exception
     */
    public function get()
    {
        $result = curl_get($this->wxLoginUrl);
        $wxResult = json_decode($result, TRUE);
        Log::save($result);
        if (empty($wxResult)) {
            throw new Exception('获取session_key以及openID时异常，微信内部错误');
        } else {
            // 存在errcode时，则发生错误
            if (array_key_exists('errcode', $wxResult)) {
                $this->processLoginError($wxResult);
            } else {
                $token = $this->grantToken($wxResult);
                return $token;
            }
        }
    }

    public function grantToken($wxResult)
    {
        // 拿到openid
        // 数据库里看一下，这个openid是不是已经存在
        // 如果存在，则不处理，如果不存在那么新增一条user记录
        // 把令牌返回到客户端去
    }

    private function processLoginError($wxResult)
    {
        throw new WeChatException([
            'msg' => $wxResult['errmsg'],
            'errorCode' => $wxResult['errcode'],
        ]);
    }
}