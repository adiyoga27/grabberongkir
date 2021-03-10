<?php

namespace App\Helpers;
trait JsonResponseTrait
{
    protected $status_code;

    public function responseDataMessage($data,$message='Success', $status_code=200){
      return $result = response()->json([
            'rajaongkir' => ([
                'query' => [
                    'key' => ""
                ],
                'status' => [
                    'code' => $status_code,
                    'description' =>  $message
                ],
                'results' => $data,
            ])
          
        ],
        $status_code);
        
      
    }

    public function errorMessage($message='Gagal', $status_code=400){

      return $result = response()->json([
            'rajaongkir' => ([
            
                'status' => [
                    'code' => $status_code,
                    'description' =>  $message
                ]
            ])
          
        ],
        $status_code);
        # code...
    }
}

?>