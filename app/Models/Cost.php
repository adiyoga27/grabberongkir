<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cost extends Model
{
    use HasFactory;
    protected $table = 'cost';
    protected $primaryKey = 'cost_id';
    protected $fillable = [
        'cost_id','type','city_id', 'subdistrict_id	', 'service_id', 'value', 'etd','note'
    ];
}
