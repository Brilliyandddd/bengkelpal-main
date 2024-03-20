<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aktivitas extends Model
{
    public function project()
    {
        return $this->belongsTo(Project_menu::class, 'id_project');
    }
    protected $fillable = [
        'id_project',
        'nama_aktivitas',
        'status_aktivitas',
        'start_aktivitas',
        'finish_aktivitas',
        'keterangan_aktivitas',
    ];
    use HasFactory;
}
