<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SayuranKriteriaLahan extends Model
{
    use HasFactory;
    protected $fillable = ["kriteria_lahan_kd", "rule_kd"];
    public function kriteria()
    {
        return $this->belongsTo(KriteriaLahan::class, "kriteria_lahan_kd");
    }
}
