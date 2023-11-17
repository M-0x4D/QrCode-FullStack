<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Ripository\MySql\CheckQrCodeStatusRipository;
use App\Http\Requests\Api\CheckRequest;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CheckQrCodeStatus extends Controller
{
    public function __invoke(CheckRequest $request)
    {
        try {
            $qrCode = $request->qrCode;
            CheckQrCodeStatusRipository::__check($qrCode);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => Response::HTTP_UNPROCESSABLE_ENTITY,
                'message' => $th->getMessage(),
                'errors' => $th->getMessage(),
                'result' => 'failed',
                'data' => null
            ]);
        }
    }
}
