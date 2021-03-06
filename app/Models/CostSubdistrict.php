<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CostSubdistrict extends Model
{
    use HasFactory;
    protected $table = 'cost_subdistrict';
    protected $primaryKey = 'cost_id';
    protected $fillable = [
        'cost_id','type','subdistrict_id', 'service_id', 'value', 'etd','note'
    ];
}
