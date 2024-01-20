<?php

namespace App\Http\Controllers;

use App\Models\KriteriaLahan;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KriteriaLahanController extends Controller
{
    public function index()
    {
        $kriteriaLahans = KriteriaLahan::paginate(10);
        return view("pages.admin.kriteriaLahan.index", compact("kriteriaLahans"));
    }
    public function show(Request $request, KriteriaLahan $kriteriaLahan)
    {
        return view("pages.admin.kriteriaLahan.show", compact("kriteriaLahan"));
    }
    public function edit(Request $request, KriteriaLahan $kriteriaLahan)
    {
        return view("pages.admin.kriteriaLahan.edit", compact("kriteriaLahan"));
    }
    public function store(Request $request)
    {
        $attr = $request->validate([
            "kd" => "required",
            "nama" => "required|unique:kriteria_lahans,nama",
        ]);
        DB::beginTransaction();
        try {
            KriteriaLahan::create($attr);
            DB::commit();
            return back()->with("success", "berhasil menyimpan data kriteriaLahan");
        } catch (QueryException $e) {
            DB::rollBack();
            return back()->with("error", "gagal menyimpan data kriteriaLahan");
        }
    }
    public function update(Request $request, KriteriaLahan $kriteriaLahan)
    {
        try {
            $attr = $request->validate([
                "kd" => "nullable",
                "nama" => "nullable",
            ]);
            $kriteriaLahan->update($attr);
            return redirect()->route("kriteriaLahan.index")->with("success", "berhasil mengubah data");
        } catch (\Throwable $e) {
            DB::rollBack();
            return back()->with("error", "gagal menyimpan data kriteria Lahan");
        }
    }
    public function destroy(Request $request, KriteriaLahan $kriteriaLahan)
    {
        $kriteriaLahan->delete();
        return back()->with("success", "berhasil menghapus data kriteria lahan");
    }
}
