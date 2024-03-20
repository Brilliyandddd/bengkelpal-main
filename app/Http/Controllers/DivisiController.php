<?php

namespace App\Http\Controllers;

use App\Models\Divisi;
use Illuminate\Http\Request;

class DivisiController extends Controller
{
    public function index()
    {
        $data = Divisi::all();
        return view('divisi', [
            'judul' => 'divisi',
            'data' => $data,
            'sidebar'=>'divisi',
        ]);
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_divisi' => 'required',
            'keterangan' => 'required',
        ]);
        Divisi::create($validatedData); //untuk menyimpan data

        // toast('Registration has been successful','success');
        return redirect()->intended('/divisi');
    }
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nama_divisi' => 'required',
            'keterangan' => 'required',
        ]);

        $kegiatans = Divisi::find($id);
        $kegiatans->nama_divisi = $validatedData['nama_divisi'];
        $kegiatans->keterangan = $validatedData['keterangan'];


        $kegiatans->save();

        // toast('Your data has been saved!','success');
        return redirect('/divisi'); // untuk diarahkan kemana
    }
    public function destroy($id)
    {
        Divisi::where('id',$id)->delete();

        return redirect('/menulanjutan');
    }
}
