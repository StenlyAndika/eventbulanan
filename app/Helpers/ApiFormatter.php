<?php

namespace App\Helpers;

class ApiFormatter
{
    protected static $response = [
        'code' => null,
        'message' => null,
        'payload' => [
            'data' => null,
        ],
    ];

    public static function response($code = null, $message = null, $data = null)
    {
        self::$response['code'] = $code;
        self::$response['message'] = $message;
        self::$response['payload']['data'] = $data;

        return response()->json(self::$response, self::$response['code']);
    }
}