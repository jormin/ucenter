<?php

namespace App\Traits;
use Illuminate\Support\Facades\Response;

/**
 * Class ApiResponder
 * @package App\Traits
 */
trait ApiResponder
{

    /**
     * @param array $data
     * @return mixed
     */
    public function responseData(array $data)
    {
        return Response::json([
            'message' => '操作成功',
            'code' => 200,
            'data' => $data
        ], 200);
    }

    /**
     * @param string $message
     * @return mixed
     */
    public function responseSuccess($message='操作成功')
    {
        return Response::json([
            'message' => $message,
            'code' => 200
        ], 200);
    }

    /**
     * @param string $message
     * @return mixed
     */
    public function responseFailed($message='操作失败')
    {
        return Response::json([
            'message' => $message,
            'code' => 400
        ], 400);
    }

    /**
     * @param string $message
     * @return mixed
     */
    public function responseError($message='未知错误')
    {
        return Response::json([
            'message' => $message,
            'code' => 500
        ], 500);
    }
}