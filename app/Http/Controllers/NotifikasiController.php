<?php

namespace App\Http\Controllers;

use App\Models\Notifikasi;
use Illuminate\Http\Request;

class NotifikasiController extends Controller
{
    public function index()
    {
        $data = Notifikasi::all();
        return view('notifikasi', [
            'judul' => 'notifikasi',
            'sidebar'=> 'Notifikasi',
            'data' => $data,
            'sidebar'=>'Notifikasi',
        ]);
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'status' => 'required',
            'keterangan' => 'required',
        ]);
        Notifikasi::create($validatedData); //untuk menyimpan data

        // toast('Registration has been successful','success');
        return redirect()->intended('/notifikasi');
    }
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'status' => 'required',
            'keterangan' => 'required',
        ]);

        $kegiatans = Notifikasi::find($id);
        $kegiatans->status = $validatedData['status'];
        $kegiatans->keterangan = $validatedData['keterangan'];


        $kegiatans->save();

        // toast('Your data has been saved!','success');
        return redirect('/notifikasi'); // untuk diarahkan kemana
    }
    public function destroy($id)
    {
        Notifikasi::where('id',$id)->delete();

        return redirect('/menulanjutan');
    }
}
