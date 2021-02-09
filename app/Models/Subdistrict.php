<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subdistrict extends Model
{
    use HasFactory;
    protected $table = 'subdistrict';
    protected $primaryKey = 'subdistrict_id';
    protected $fillable = [
        'province_id','province','city_id','city','type','subdistrict_name'
    ];

    public function cityt()
    {
        return $this->belongsTo(City::class, 'city_id')->withDefault();
    }

    public function province()
    {
        return $this->belongsTo(Province::class, 'province_id');
    }

    public function transaction()
    {
        return $this->belongsTo(Transaction::class, 'customer_cityprovince');
    }

    public function transactionRec()
    {
        return $this->belongsTo(Transaction::class, 'receiver_cityprovince');
    }

}
