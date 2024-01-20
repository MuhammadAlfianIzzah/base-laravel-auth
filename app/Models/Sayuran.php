<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sayuran extends Model
{
    protected $primaryKey = "kd";
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = ["nama", "deskripsi", "foto", "kd"];
    use HasFactory;
    public function sayuranKriteria()
    {
        return $this->hasMany(SayuranKriteriaLahan::class, "sayuran_kd");
    }
    public function rules()
    {
        return $this->hasMany(Rules::class, "sayuran_kd");
    }
}
