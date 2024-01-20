<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KonsultasiKriteriaLahan extends Model
{
    protected $primaryKey = "kd";
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = ["kriteria_lahan_kd", "konsultasi_kd"];
    use HasFactory, HasUuids;
    public function kriteriaLahan()
    {
        return $this->belongsTo(KriteriaLahan::class, "kriteria_lahan_kd");
    }
}
