<?php


namespace App\Http\Controllers;

use App\Models\Aktivitas;
use App\Models\Menu_lanjutan;
use App\Models\Notifikasi;
use App\Models\Project_menu;
use App\Models\Revisi_gambar;
use App\Models\Tool;
use App\Models\Divisi;
use Illuminate\Support\Facades\DB;


class DashboardController extends Controller
{
    public function index()
    {

        $year = date('Y'); // Tahun saat ini
        $months = range(1, 12); // Array bulan dari Januari hingga Desember

        $projectsPerMonth = Project_menu::select(DB::raw('MONTH(start_project) as month'), DB::raw('COUNT(*) as project_count'))
            ->whereYear('start_project', $year)
            ->groupBy(DB::raw('MONTH(start_project)'))
            ->get();

        $aktivitasPerMonth = Aktivitas::select(DB::raw('MONTH(start_aktivitas) as month'), DB::raw('COUNT(*) as aktivitas_count'))
            ->whereYear('start_aktivitas', $year)
            ->groupBy(DB::raw('MONTH(start_aktivitas)'))
            ->get();
        $result = [];

        $toolsPerMonth = Tool::select(DB::raw('MONTH(kalibrasi_date) as month'), DB::raw('COUNT(*) as tools_count'))
            ->whereYear('kalibrasi_date', $year)
            ->groupBy(DB::raw('MONTH(kalibrasi_date)'))
            ->get();
        $result = [];

        foreach ($months as $month) {
            $projectData = $projectsPerMonth->firstWhere('month', $month);
            $aktivitasData = $aktivitasPerMonth->firstWhere('month', $month);
            $toolsData = $toolsPerMonth->firstWhere('month', $month);

            $result[] = [
                'month' => $month,
                'project_count' => $projectData ? $projectData->project_count : 0,
                'aktivitas_count' => $aktivitasData ? $aktivitasData->aktivitas_count : 0,
                'tools_count' => $toolsData ? $toolsData->tools_count : 0,
            ];
        }


        $data = Notifikasi::all();
        return view('dashboard', [
            'judul' => 'Dashboard',
            'sidebar' => 'Dashboard',
            'jml_project' => Project_menu::count(),
            'jml_person' => Menu_lanjutan::count(),
            'jml_toolsnon' => Tool::where('status_tools', 'Non Aktif')->count(),
            'jml_toolsactive' => Tool::where('status_tools', 'Aktif')->count(),
            'result' => $result,
            'data' => $data,
        ]);
    }
}
