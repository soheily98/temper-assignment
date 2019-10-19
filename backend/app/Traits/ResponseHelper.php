<?php

namespace App\Traits;

trait ResponseHelper
{
    function success($data)
    {
        return response()->json([
            'success' => true,
            'message' => "OK",
            'data' => $data
        ]);
    }
}
