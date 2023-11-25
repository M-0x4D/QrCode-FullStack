<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Ripository\MySql\UpdateQrCodeStatusRepository;
use App\Http\Requests\Api\UpdateRequest;
use App\Models\QrCode;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class UpdateQrCodeStatus extends Controller
{
    public function __invoke(UpdateRequest $request)
    {
        try {

            $status = $request->status;
            $image = $request->image;
            UpdateQrCodeStatusRepository::__update($image, $status);
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


    function testFunc()
    {
        return "test res";
    }
}
