<?php

namespace App\Http\Controllers;

use App\Models\Tool;
use Illuminate\Http\Request;

class ToolsController extends Controller
{
    public function index()
    {
        $data = Tool::all();
        return view('tools', [
            'judul' => 'tools',
            'data' => $data,
            'sidebar'=> 'Tools',
        ]);
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_tools' => 'required',
            'jumlah_tools' => 'required',
            'status_tools' => 'required',
            'kalibrasi_date' => 'required',
        ]);
        Tool::create($validatedData); //untuk menyimpan data

        // toast('Registration has been successful','success');
        return redirect()->intended('/tools');
    }
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nama_tools' => 'required',
            'jumlah_tools' => 'required',
            'status_tools' => 'required',
            'kalibrasi_date' => 'required',
        ]);

        $kegiatans = Tool::find($id);

        $kegiatans->nama_tools = $validatedData['nama_tools'];
        $kegiatans->jumlah_tools = $validatedData['jumlah_tools'];
        $kegiatans->status_tools = $validatedData['status_tools'];
        $kegiatans->kalibrasi_date = $validatedData['kalibrasi_date'];

        $kegiatans->save();

        // toast('Your data has been saved!','success');
        return redirect('/tools'); // untuk diarahkan kemana
    }
    public function destroy($id)
    {
        Tool::where('id',$id)->delete();

        return redirect('/tools');
    }

}
