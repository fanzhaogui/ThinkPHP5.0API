<?php
/**
 * User: Andy
 * Date: 2019/7/20
 * Time: 15:40
 */

namespace app\api\controller;


use app\api\service\UserToken;
use app\api\validate\TokenGet;
use think\Controller;
use app\api\service\Token as TokenService;

class Token extends Controller
{

    /**
     * 通过微信端的code，获取用户令牌
     *
     * @url /api/:version/token/user
     * @return \think\response\Json
     */
    public function getToken()
    {
        (new TokenGet())->goCheck();
        $ut = new UserToken($this->request->param('code'));
        $token = $ut->get();

        return json(['token' => $token]);
    }
}