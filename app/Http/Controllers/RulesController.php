<?php

namespace App\Http\Controllers;

use App\Models\KriteriaLahan;
use App\Models\Rules;
use App\Models\Sayuran;
use App\Models\SayuranKriteriaLahan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

// ? rules == kriteria lahan
class RulesController extends Controller
{
    public function index()
    {
        $rules = Rules::orderByRaw('CAST(SUBSTRING(kd, 2) AS UNSIGNED) ASC')->paginate(10);
        $kategoriSayuran = Sayuran::get();
        $kriteriaLahan = KriteriaLahan::get();
        return view("pages.admin.rules.index", compact("rules", "kriteriaLahan", "kategoriSayuran"));
    }
    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            $attr = $request->validate([
                "kd" => "required|unique:rules,kd",
                "sayuran_kd" => "required",
                "kriteria_lahan_kd" => "required",
            ]);
            $rule = Rules::create($attr);
            foreach ($attr["kriteria_lahan_kd"] as $key => $value) {
                SayuranKriteriaLahan::create([
                    "kriteria_lahan_kd" => $value,
                    "rule_kd" => $rule->kd
                ]);
            }
            DB::commit();
            return redirect()->route("rules.index")->with("success", "berhasil menyimpan data rules");
        } catch (\Throwable $e) {
            DB::rollBack();
            return back()->with("error", "gagal menghapus data rules");
        }
    }
    public function destroy(Request $request, Rules $rule)
    {
        $rule->delete();
        return back()->with("success", "berhasil menghapus data rules");
    }
}
