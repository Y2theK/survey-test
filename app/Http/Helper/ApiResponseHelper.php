<?php

namespace App\Http\Helper;

class ApiResponseHelper
{
    public static function success($message, $data, $status)
    {
        return response()->json([
          'message' => $message,
          'data' => $data
        ], $status);
    }
}
