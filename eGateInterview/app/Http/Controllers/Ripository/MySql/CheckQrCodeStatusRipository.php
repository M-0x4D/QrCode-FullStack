<?php

namespace App\Http\Controllers\Ripository\MySql;

use App\Models\QrCode;
use Illuminate\Http\Response;

class CheckQrCodeStatusRipository
{

    static function __check($qrCode)
    {
        try {
            $status = QrCode::where("image", $qrCode)->first()->status;
            return response()->json([
                'status' => Response::HTTP_OK,
                'message' => "Qr Code status returned Successfully",
                'errors' => null,
                'result' => 'success',
                'data' => $status
            ]);
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
