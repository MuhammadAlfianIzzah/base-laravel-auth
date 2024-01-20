<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Konsultasi extends Model
{
    protected $primaryKey = "kd";
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = ["nama", "user_id"];
    use HasFactory, HasUuids;
    public function konsultasiKriteriaLahan()
    {
        return $this->hasMany(KonsultasiKriteriaLahan::class, "konsultasi_kd");
    }
}
