<?php

namespace App\Http\Controllers;

use App\Models\Menu_lanjutan;
use Illuminate\Http\Request;

class MenuLanjutanController extends Controller
{
    public function index()
    {
        $data = Menu_lanjutan::all();
        return view('menulanjutan', [
            'judul' => 'menulanjutan',
            'data' => $data,
            'sidebar'=>'Project',
        ]);
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nip' => 'required',
            'nama' => 'required',
            'jabatan' => 'required',
        ]);
        Menu_lanjutan::create($validatedData); //untuk menyimpan data

        // toast('Registration has been successful','success');
        return redirect()->intended('/menulanjutan');
    }
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nip' => 'required',
            'nama' => 'required',
            'jabatan' => 'required',
        ]);

        $kegiatans = Menu_lanjutan::find($id);
        $kegiatans->nip = $validatedData['nip'];
        $kegiatans->nama = $validatedData['nama'];
        $kegiatans->jabatan = $validatedData['jabatan'];

        $kegiatans->save();

        // toast('Your data has been saved!','success');
        return redirect('/menulanjutan'); // untuk diarahkan kemana
    }
    public function destroy($id)
    {
        Menu_lanjutan::where('id',$id)->delete();

        return redirect('/menulanjutan');
    }
}
