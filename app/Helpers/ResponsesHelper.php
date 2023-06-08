<?php


namespace App\Helpers;


class ResponsesHelper
{


    public static function returnSuccessMessage($code, $msg = "")
    {
        return [
            'status' => true,
            'code'   => (int)$code,
            'msg'    => $msg
        ];
    }

    public static function returnData($dataArr, $code = 200, $msg = "")
    {
        return response()->json([
            'status' => true,
            'code'   => (int)$code,
            'msg'    => $msg,
            'data'   => $dataArr
        ])->setStatusCode($code);
    }

    public static function returnError($code, $msg)
    {
        return response()->json([
            'status' => false,
            'code'   => (int)$code,
            'msg'    => $msg
        ])->setStatusCode($code);
    }

    public static function returnValidationError($code = "400", $validator)
    {
        return self::returnError($code, implode(",", $validator->errors()->all()));
    }


}
