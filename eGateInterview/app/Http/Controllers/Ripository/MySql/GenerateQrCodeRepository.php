<?php

namespace App\Http\Controllers\Ripository\MySql;

use App\Models\QrCode;
use Illuminate\Http\Response;

class GenerateQrCodeRepository
{
    static function __generate($image){

        try {
            QrCode::create([
                "image"=> $image,
                "status" => "Created"
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
