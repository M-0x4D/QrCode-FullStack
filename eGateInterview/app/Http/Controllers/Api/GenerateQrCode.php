<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\GenerateRequest;
use App\Jobs\InsertDataBase;
use App\Models\QrCode as ModelsQrCode;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use nguyenary\QRCodeMonkey\QRCode;


class GenerateQrCode extends Controller
{
    protected $images = array();

    function generateRandomString($length = 10)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';

        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }

        return $randomString;
    }

    function generate(GenerateRequest $request)
    {
        try {
            $num = $request->num;
            while ($num--) {

                $qrcode = new QRCode($this->generateRandomString());

                //use config (Width and height sizes support up to 3480 pixel)
                $qrcode->setConfig([
                    'bgColor' => '#FFFFFF',
                    'body' => 'square',
                    'bodyColor' => '#0277bd',
                    'brf1' => [],
                    'brf2' => [],
                    'brf3' => [],
                    'erf1' => [],
                    'erf2' => [],
                    'erf3' => [],
                    'eye' => 'frame0',
                    'eye1Color' => '#000000',
                    'eye2Color' => '#000000',
                    'eye3Color' => '#000000',
                    'eyeBall' => 'ball0',
                    'eyeBall1Color' => '#000000',
                    'eyeBall2Color' => '#000000',
                    'eyeBall3Color' => '#000000',
                    'gradientColor1' => '#0277bd',
                    'gradientColor2' => '#000000',
                    'gradientOnEyes' => 'true',
                    'gradientType' => 'linear',
                ]);

                $qrcode->setFileType('png');
                $qrcode->setSize(200);


                // output is file
                $imageName = $this->generateRandomString();
                $image = $qrcode->create("BarCodes/$imageName.png");
                $this->images[] = $image;
                InsertDataBase::dispatch($image);
            }
            return response()->json([
                'status' => Response::HTTP_OK,
                'message' => "Qr Code/s Generated Successfully",
                'errors' => null,
                'result' => 'success',
                'data' => $this->images
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


    function qrCodes()
    {
        try {
            $codes = ModelsQrCode::get();
            return response()->json([
                'status' => Response::HTTP_OK,
                'message' => "Qr Code/s Returned Successfully",
                'errors' => null,
                'result' => 'success',
                'data' => $codes
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
