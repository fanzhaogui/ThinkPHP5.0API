<?php
/**
 * User: Andy
 * Date: 2019/7/19
 * Time: 22:40
 */

namespace app\lib\exception;


use Exception;
use think\exception\Handle;
use think\Log;
use think\Request;

class ExceptionHandler extends Handle
{
    protected $code;
    protected $msg;
    protected $errorCode;


    public function render(Exception $e)
    {
        if ($e instanceof BaseException) {
            $this->code = $e->code;
            $this->msg = $e->msg;
            $this->errorCode = $e->errorCode;
        } else {
            if (config('app_debug')) {
                return parent::render($e);
            } else {
                $this->code = 500;
                $this->msg = '服务器内部错误';
                $this->errorCode = 999;
                $this->recordErrorLog($e);
            }
        }
        $request = Request::instance();
        $result = [
            'msg' => $this->msg,
            'error_code' => $this->errorCode,
            'request_url' => $request->url() // 获取当前的请求地址
        ];
        return json($result, $this->code);
    }

    /**
     * 记录error错误
     * @param  Exception $e [description]
     * @return [type]       [description]
     */
    private function recordErrorLog(Exception $e)
    {
        // 由于配置文件config.php中已经关闭了日志记录，所以这里在记录之前，需初始化
        Log::init([
            'type'  => 'File',
            'path'  => LOG_PATH,
            'level' => ['error'] // 只记录error级别的错误
        ]);
        Log::record($e->getMessage(), 'error');
    }
}