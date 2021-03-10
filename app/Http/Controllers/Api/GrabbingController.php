<?php

namespace App\Http\Controllers\Api;

use App\Helpers\JsonResponseTrait;
use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Cost;
use App\Models\CostCity;
use App\Models\CostSubdistrict;
use App\Models\Courier;
use App\Models\Province;
use App\Models\Service;
use App\Models\Subdistrict;
use Illuminate\Http\Request;
use Steevenz\Rajaongkir;
class GrabbingController extends Controller
{
    use JsonResponseTrait;
    public $rajaongkir;
    public function __construct() {
        $this->rajaongkir = new Rajaongkir(env('APP_RAJAONGKIR'), Rajaongkir::ACCOUNT_PRO);
    }


    function province()
    {
      
        return $this->responseDataMessage($this->rajaongkir->getProvinces());
    }

    function city($id)
    {
        return $this->rajaongkir->getCities($id);
    }

    function subdistrict($id)
    {
        $data =  $this->rajaongkir->getSubdistricts($id);
        // if($data){
        //     $query['key'] = 
        // }
        // return 
    }



    function getProvince()
    {
        $data = $this->rajaongkir->getProvinces();
 

        
        // return $this->rajaongkir->getProvinces();
        Province::upsert($data, ['province_id', 'province']);
        return $this->rajaongkir->getProvinces();
    }
    function getCity()
    {
        $result = Province::all();
        foreach ($result as $value) {
            $data = $this->rajaongkir->getCities($value['province_id']);
            City::insertOrIgnore($data);
            // break;
        }
     
     
        return $data;
    }
    function getSubdistrict()
    {
        $result = City::all();
        foreach ($result as  $value) {
            $data = $this->rajaongkir->getSubdistricts($value['city_id']);
            Subdistrict::upsert($data, ['province_id','province','city_id','city','type','subdistrict_name']);
            // break;
        }
        return $data;
    }

    function getCostByCity()
    {
      
        $city_id = 114;
        $origin = ['city' => $city_id];
        
        $sub = City::all();

        foreach ($sub as $val_sub) {
            # code...
        
        $destination = ['city'=> $val_sub['city_id']];
        // if(strtolower($type) == 'city'){
        $data  = $this->rajaongkir->getCost($origin,$destination, 1000, 'jne:tiki');
        // }

            //rekap courier
        foreach ($data as $value) {
            $result['code'] = $value['code'];
            $result['name'] = $value['name'];
            $ser = $value['costs'];
             //insert Courier
             $courier[] = $result;
            Courier::insertOrIgnore($courier);
            foreach ($ser as $dt) {
                $res['code'] = $value['code'];
                $res['service'] = $dt['service'];
                $res['description'] = $dt['description'];

                //insert paket
                $cos = $dt['cost'];
                
                $service[] = $res;
                
                Service::insertOrIgnore($service);
                foreach ($cos as $val_cos) {
                    $service_id = Service::where('code',$value['code'])->first();
                    $arr['type'] = 'City';
                    $arr['city_id'] = $city_id;
                    $arr['service_id'] = $service_id['service_id'];
                    $arr['value'] = $val_cos['value'];
                    $arr['etd'] = $val_cos['etd'];
                    $arr['note'] = $val_cos['note'];

                    $cost[] = $arr;
                }
            
            }
           
        }
        // break;
    }
        //rekap paket
        CostCity::insertOrIgnore($cost);
        return $cost;
    }

    
    function getCostBySubdistrict()
    {
      
        $city_id = 114;
        $origin = ['city' => $city_id];
        
        $sub = Subdistrict::all();

        foreach ($sub as $val_sub) {
            # code...
        
        $destination = ['subdistrict'=> $val_sub['subdistrict_id']];
        // if(strtolower($type) == 'city'){
        $data  = $this->rajaongkir->getCost($origin,$destination, 1000, 'jne:tiki');
        // }

            //rekap courier
        foreach ($data as $value) {
            $result['code'] = $value['code'];
            $result['name'] = $value['name'];
            $ser = $value['costs'];
            
            //insert Courier
            $courier[] = $result;

        //rekap paket
        Courier::insertOrIgnore($courier);
            foreach ($ser as $dt) {
                $res['code'] = $value['code'];
                $res['service'] = $dt['service'];
                $res['description'] = $dt['description'];

                //insert paket
                $cos = $dt['cost'];
                
                $service[] = $res;

                Service::insertOrIgnore($service);
                foreach ($cos as $val_cos) {
                    $service_id = Service::where('code',$value['code'])->first();
                    $arr['type'] = 'Subdistrict';
                    $arr['subdistrict_id'] = $city_id;
                    $arr['service_id'] = $service_id['service_id'];
                    $arr['value'] = $val_cos['value'];
                    $arr['etd'] = $val_cos['etd'];
                    $arr['note'] = $val_cos['note'];

                    $cost[] = $arr;
                }
            
            }
        }
        break;
    }
        CostSubdistrict::insertOrIgnore($cost);
        return $cost;
    }
   

}
?>