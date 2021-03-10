<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Province;
use Illuminate\Http\Request;
use Steevenz\Rajaongkir;

class CityController extends Controller
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


        $result = Province::all();
        foreach ($result as $value) {
            $data = $rajaongkir->getCities($value['province_id']);
            City::upsert($data, ['province_id','province','type','city_name','postal_code']);

        }
    }
}
