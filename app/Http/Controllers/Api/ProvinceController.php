<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Province;
use Illuminate\Http\Request;
use Steevenz\Rajaongkir;

class ProvinceController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    
    public function __invoke()
    {
        $rajaongkir = new Rajaongkir(env('APP_RAJAONGKIR'), Rajaongkir::ACCOUNT_PRO);
        $data = $rajaongkir->getProvinces();
  
        // return $this->rajaongkir->getProvinces();
        Province::upsert($data, ['province_id', 'province']);
        // return $this->rajaongkir->getProvinces();
    }
}
