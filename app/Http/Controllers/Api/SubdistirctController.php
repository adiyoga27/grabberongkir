<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Subdistrict;
use Illuminate\Http\Request;
use Steevenz\Rajaongkir;

class SubdistirctController extends Controller
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
        $result = City::all();
        foreach ($result as  $value) {
            $data = $rajaongkir->getSubdistricts($value['city_id']);
            Subdistrict::upsert($data, ['province_id','province','city_id','city','type','subdistrict_name']);
      
        }

    }
}
