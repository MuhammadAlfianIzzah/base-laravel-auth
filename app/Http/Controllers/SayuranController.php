<?php

namespace App\Http\Controllers;

use App\Models\Sayuran;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SayuranController extends Controller
{
    public function index()
    {
        $sayurans = Sayuran::paginate();
        return view("pages.admin.sayuran.index", compact("sayurans"));
    }
    public function show(Request $request, Sayuran $sayuran)
    {
        return view("pages.admin.sayuran.show", compact("sayuran"));
    }
    public function edit(Request $request, Sayuran $sayuran)
    {
        return view("pages.admin.sayuran.edit", compact("sayuran"));
    }
    public function store(Request $request)
    {
        $attr = $request->validate([
            "kd" => "required",
            "nama" => "required|unique:sayurans,nama",
            "deskripsi" => "required",
            "foto" => "required|mimes:png,jpg",
        ]);
        DB::beginTransaction();
        try {
            $attr['foto'] = $request->file("foto")->store("uploads");
            Sayuran::create($attr);
            DB::commit();
            return back()->with("success", "berhasil menyimpan data sayuran");
        } catch (QueryException $e) {
            dd($e);
            DB::rollBack();
            return back()->with("error", "gagal menyimpan data sayuran");
        }
    }
    public function update(Request $request, Sayuran $sayuran)
    {

        try {
            $attr = $request->validate([
                "kd" => "nullable",
                "nama" => "nullable",
                "deskripsi" => "nullable",
                "foto" => "nullable",
            ]);
            if (!is_null($request->file("foto"))) {
                $attr['foto'] = $request->file("foto")->store("/uploads");
            }
            $sayuran->update($attr);
            return redirect()->route("sayuran.index")->with("success", "berhasil mengubah data");
        } catch (\Throwable $e) {
            DB::rollBack();
            return back()->with("error", "gagal menyimpan data sayuran");
        }
    }
    public function destroy(Request $request, Sayuran $sayuran)
    {
        $sayuran->delete();
        return back()->with("success", "berhasil menghapus data sayuran");
    }
}
