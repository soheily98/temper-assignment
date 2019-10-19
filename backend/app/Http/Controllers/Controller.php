<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;

class Controller extends BaseController
{
    function success($data)
    {
        return response()->json([
            'success' => true,
            'message' => "OK",
            'data' => $data,
        ]);
    }
}
