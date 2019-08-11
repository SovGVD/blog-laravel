<?php

namespace App\Http\Controllers\API\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class APIController extends Controller
{
    public function success($result, $code = 200)
    {
        return response()->json(['success' => true, 'message' => $result], $code);
    }

    public function fail($result, $code = 404)
    {
        return response()->json(['success' => false, 'message' => $result], 404);
    }
}
