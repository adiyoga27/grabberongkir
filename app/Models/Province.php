<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    use HasFactory;

    protected $table = 'province';
    protected $primaryKey = 'province_id';
    protected $fillable = [
        'province'
    ];
    public $timestamps = true;

    public function city()
    {
        return $this->hasMany(City::class, 'province_id');
    }

    public function subdistrict()
    {
       return $this->hasMany(Subdistric::class)->withDefault();
    }
}
