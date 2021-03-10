<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CostCity extends Model
{
    use HasFactory;
    protected $table = 'cost_city';
    protected $primaryKey = 'cost_id';
    protected $fillable = [
        'cost_id','type','city_id', 'service_id', 'value', 'etd','note'
    ];
}
