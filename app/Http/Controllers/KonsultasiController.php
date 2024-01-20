<?php

namespace App\Http\Controllers;

use App\Models\Konsultasi;
use App\Models\KonsultasiKriteriaLahan;
use App\Models\KriteriaLahan;
use App\Models\Rules;
use App\Models\Sayuran;
use App\Models\SayuranKriteriaLahan;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class KonsultasiController extends Controller
{
    public function index()
    {
        $konsultasis = Konsultasi::paginate();
        $kriteriaLahan = KriteriaLahan::get();
        return view("pages.admin.konsultasi.index", compact("konsultasis", "kriteriaLahan"));
    }
    public function show(Request $request, Konsultasi $konsultasi)
    {
        // sayuran
        $rules = Rules::get();
        // array konsultasi kriteria lahan
        $arrayKkl = $konsultasi->konsultasiKriteriaLahan->pluck("kriteria_lahan_kd")->toArray();
        $ruleTerpilih = [];
        foreach ($rules as $key => $rule) {
            // array rule kriteria lahan
            $arrayRKL = $rule->sayuranKriteria->pluck("kriteria_lahan_kd")->toArray();
            // Menggunakan array_diff untuk mencari perbedaan antara array1 dan array2
            $diff = array_diff($arrayRKL, $arrayKkl);

            // Jika array_diff menghasilkan array kosong, berarti semua elemen array2 terdapat di array1
            if (empty($diff)) {
                $ruleTerpilih[] = $rule;
            }
        }

        return view("pages.admin.konsultasi.show", compact("konsultasi", "ruleTerpilih"));
    }

    public function store(Request $request)
    {
        $attr = $request->validate([
            "nama" => "required",
            "kriteria_lahan_kd" => "required",
        ]);
        $attr["user_id"] = Auth::user()->id;
        DB::beginTransaction();
        try {
            // simpan konsultasi
            $konsultasi = Konsultasi::create($attr);
            // simpan kriteria lahan konsultasi
            foreach ($attr["kriteria_lahan_kd"] as $key => $value) {
                $attrKriteria = [
                    "kriteria_lahan_kd" => $value,
                    "konsultasi_kd" => $konsultasi->kd
                ];
                KonsultasiKriteriaLahan::create($attrKriteria);
            }

            DB::commit();
            return back()->with("success", "berhasil menyimpan data konsultasi");
        } catch (QueryException $e) {
            DB::rollBack();
            return back()->with("error", "gagal menyimpan data konsultasi");
        }
    }

    public function destroy(Request $request, Konsultasi $konsultasi)
    {
        $konsultasi->delete();
        return back()->with("success", "berhasil menghapus data konsultasi");
    }
}
