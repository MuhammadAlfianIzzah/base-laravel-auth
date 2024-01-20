<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rules extends Model
{
    protected $primaryKey = "kd";
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = ["kd", "sayuran_kd"];
    use HasFactory;
    public function sayuranKriteria()
    {
        return $this->hasMany(SayuranKriteriaLahan::class, "rule_kd");
    }
    public function sayuran()
    {
        return $this->belongsTo(Sayuran::class, "sayuran_kd");
    }
}
