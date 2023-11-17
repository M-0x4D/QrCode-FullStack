<?php

namespace App\Http\Controllers\Ripository\MySql;

use App\Models\QrCode;
use Illuminate\Http\Response;

class UpdateQrCodeStatusRepository
{
    static function __update($image ,$status)
    {
        try {
            $qrCode = QrCode::where('image', $image)->update([
                'status' => $status
            ]);

            return response()->json([
                'status' => Response::HTTP_OK,
                'message' => "Qr Code Status Updated Successfully",
                'errors' => null,
                'result' => 'success',
                'data' => $qrCode
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
