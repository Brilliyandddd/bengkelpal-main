<?php

namespace App\Http\Controllers;

use App\Models\Project_menu;
use App\Models\Revisi_gambar;
use Illuminate\Http\Request;

class RevisiGambarController extends Controller
{

    public function index()
    {
        $data = Revisi_gambar::with('project')->get();
        return view('revisigambar', [
            'judul' => 'revisigambar',
            'isicombo' => Project_menu::get(),
            'data' => $data,
            'sidebar'=> 'Revisigambar',
        ]);
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'id_project' => 'required',
            'status_revisi' => 'required',
            'judul_revisi' => 'required',
            'keterangan_revisi' => 'required',

        ]);
        Revisi_gambar::create($validatedData); //untuk menyimpan data

        // toast('Registration has been successful','success');
        return redirect()->intended('/revisigambar');
    }
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'id_project' => 'required',
            'status_revisi' => 'required',
            'judul_revisi' => 'required',
            'keterangan_revisi' => 'required',
        ]);

        $kegiatans = Revisi_gambar::find($id);
        $kegiatans->id_project = $validatedData['id_project'];
        $kegiatans->status_revisi = $validatedData['status_revisi'];
        $kegiatans->judul_revisi = $validatedData['judul_revisi'];
        $kegiatans->keterangan_revisi = $validatedData['keterangan_revisi'];

        $kegiatans->save();

        // toast('Your data has been saved!','success');
        return redirect('/revisigambar'); // untuk diarahkan kemana
    }
    public function destroy($id)
    {
        Revisi_gambar::where('id', $id)->delete();

        return redirect('/revisigambar');
    }
}
