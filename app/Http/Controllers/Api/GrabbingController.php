<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Cost;
use App\Models\Courier;
use App\Models\Province;
use App\Models\Service;
use App\Models\Subdistrict;
use Illuminate\Http\Request;
use Steevenz\Rajaongkir;
class GrabbingController extends Controller
{
    public $rajaongkir;
    public function __construct() {
        $this->rajaongkir = new Rajaongkir(env('APP_RAJAONGKIR'), Rajaongkir::ACCOUNT_PRO);
    }

    function getProvince()
    {
        $data = $this->rajaongkir->getProvinces();
        Province::insertOrIgnore($data);
        return $this->rajaongkir->getProvinces();
    }
    function getCity()
    {
        $result = Province::all();
        foreach ($result as $value) {
            $data = $this->rajaongkir->getCities($value['province_id']);
            City::insertOrIgnore($data);
        }
     
     
        return true;
    }
    function getSubdistrict()
    {
        $result = City::all();
        foreach ($result as  $value) {
            $data = $this->rajaongkir->getSubdistricts($value['city_id']);
            Subdistrict::insertOrIgnore($data);
        }
        return true;
    }

    function getCostByCity()
    {
      
        $city_id = 501;
        $origin = ['city' => $city_id];
        $destination = ['subdistrict'=> 574];
        // if(strtolower($type) == 'city'){
        $data  = $this->rajaongkir->getCost($origin,$destination, 1000, 'jne:tiki');
        // }

            //rekap courier
        foreach ($data as $value) {
            $result['code'] = $value['code'];
            $result['name'] = $value['name'];
            $ser = $value['costs'];
            foreach ($ser as $dt) {
                $res['code'] = $value['code'];
                $res['service'] = $dt['service'];
                $res['description'] = $dt['description'];
                //insert paket
                $cos = $dt['cost'];
                foreach ($cos as $val_cos) {
                    $arr['type'] = 'City';
                    $arr['city_id'] = $city_id;
                    $arr['service_id'] = Service::where('code',$res['code'])->first();
                    $arr['value'] = $val_cos['value'];
                    $arr['etd'] = $val_cos['etd'];
                    $arr['note'] = $val_cos['note'];

                    $cost[] = $arr;
                }
                $service[] = $res;
            
            }
            //insert Courier
            $courier[] = $result;
        }
        //rekap paket
        Courier::insertOrIgnore($courier);
        Service::insertOrIgnore($service);
        Cost::insertOrIgnore($cost);
        return true;
    }

    
    function getCostBySubdistrict()
    {
      
        $city_id = 501;
        $origin = ['city' => $city_id];
        $destination = ['subdistrict'=> 574];
        // if(strtolower($type) == 'city'){
        $data  = $this->rajaongkir->getCost($origin,$destination, 1000, 'jne:tiki');
        // }

            //rekap courier
        foreach ($data as $value) {
            $result['code'] = $value['code'];
            $result['name'] = $value['name'];
            $ser = $value['costs'];
            foreach ($ser as $dt) {
                $res['code'] = $value['code'];
                $res['service'] = $dt['service'];
                $res['description'] = $dt['description'];
                //insert paket
                $cos = $dt['cost'];
                foreach ($cos as $val_cos) {
                    $arr['type'] = 'City';
                    $arr['city_id'] = $city_id;
                    $arr['service_id'] = Service::where('code',$res['code'])->first();
                    $arr['value'] = $val_cos['value'];
                    $arr['etd'] = $val_cos['etd'];
                    $arr['note'] = $val_cos['note'];

                    $cost[] = $arr;
                }
                $service[] = $res;
            
            }
            //insert Courier
            $courier[] = $result;
        }
        //rekap paket
        Courier::insertOrIgnore($courier);
        Service::insertOrIgnore($service);
        Cost::insertOrIgnore($cost);
        return true;
    }
   

}
?>