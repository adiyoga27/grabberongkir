<?php

namespace App\Helpers;
trait JsonResponseTrait
{
    protected $status_code;

    public function responseDataMessage($data,$message='Success', $status_code=200){
        $result = response()->json([
            'result' => $data,
            'message' => $message,
            'status' =>True
        ],
        $status_code);
        
        return $res['rajaongkir'] = $result;
    }
}

?>