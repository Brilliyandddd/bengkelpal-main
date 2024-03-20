<?php

namespace App\Http\Controllers;

use App\Models\Aktivitas;
use App\Models\Project_menu;
use Illuminate\Http\Request;
use SebastianBergmann\CodeCoverage\Report\Xml\Project;

class AktivitasController extends Controller
{
    public function index()
    {
        $data = Aktivitas::with('project')->get();
        return view('aktivitas', [
            'judul' => 'aktivitas',
            'isicombo' => Project_menu::get(),
            'data' => $data,
            'sidebar'=> 'Aktivitas',

        ]);
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'id_project' => 'required',
            'nama_aktivitas' => 'required',
            'start_aktivitas' => 'required',
            'finish_aktivitas' => 'required',
            'status_aktivitas' => 'required',
            'keterangan_aktivitas' => 'required',
        ]);

        Aktivitas::create($validatedData); //untuk menyimpan data

        // toast('Registration has been successful','success');
        return redirect()->intended('/aktivitas');
    }
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'id_project' => 'required',
            'nama_aktivitas' => 'required',
            'start_aktivitas' => 'required',
            'finish_aktivitas' => 'required',
            'status_aktivitas' => 'required',
            'keterangan_aktivitas' => 'required',
        ]);

        $kegiatans = Aktivitas::find($id);
        $kegiatans->id_project = $validatedData['id_project'];
        $kegiatans->nama_aktivitas = $validatedData['nama_aktivitas'];
        $kegiatans->start_aktivitas = $validatedData['start_aktivitas'];
        $kegiatans->finish_aktivitas = $validatedData['finish_aktivitas'];
        $kegiatans->status_aktivitas = $validatedData['status_aktivitas'];
        $kegiatans->keterangan_aktivitas = $validatedData['keterangan_aktivitas'];

        $kegiatans->save();

        // toast('Your data has been saved!','success');
        return redirect('/aktivitas'); // untuk diarahkan kemana
    }
    public function destroy($id)
    {
        Aktivitas::where('id', $id)->delete();

        return redirect('/aktivitas');
    }
}
