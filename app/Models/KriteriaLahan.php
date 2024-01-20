<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KriteriaLahan extends Model
{
    protected $primaryKey = "kd";
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = ["nama", "kd"];
    use HasFactory;
}
