<?php

namespace App\Http\Controllers;

use App\Models\Project_menu;
use Illuminate\Http\Request;


class ProjectMenuController extends Controller
{
    public function index()
    {
        $data = Project_menu::all();
        return view('projectmenu', [
            'judul' => 'Projectmenu',
            'data' => $data,
            'sidebar'=> 'Project'
        ]);
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_project' => 'required',
            'start_project' => 'required',
            'finish_project'=> 'required',
            'keterangan_project' => 'required|min:5',
        ]);
        Project_menu::create($validatedData); //untuk menyimpan data

        // toast('Registration has been successful','success');
        return redirect()->intended('/projectmenu');
    }
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nama_project' => 'required',
            'start_project' => 'required',
            'finish_project'=> 'required',
            'keterangan_project' => 'required|min:5',
        ]);

        $kegiatans = Project_menu::find($id);
        $kegiatans->nama_project = $validatedData['nama_project'];
        $kegiatans->start_project = $validatedData['start_project'];
        $kegiatans->finish_project = $validatedData['finish_project'];
        $kegiatans->keterangan_project = $validatedData['keterangan_project'];

        $kegiatans->save();

        // toast('Your data has been saved!','success');
        return redirect('/projectmenu'); // untuk diarahkan kemana
    }
    public function destroy($id)
    {
        Project_menu::where('id',$id)->delete();

        return redirect('/projectmenu');
    }
}
