<?php

namespace App\Http\Helpers;

trait AppResponseTrait
{
    public function responseWithData($data , $httpCode=200,$message=''){
        return response()->json([
            'data'=> $data,
            'status'=>'Ok',
            'message'=> $message,
            'httpCode'=> $httpCode
        ], $httpCode);
    }
    public function sendErrorPopup($error =[],$message ='',$httpCode=500){
        return response()->json([
            'errors'=> $error,
            'status'=>'Error',
            'message'=>$message,
            'httpCode'=> $httpCode
        ], $httpCode);
    }

}
