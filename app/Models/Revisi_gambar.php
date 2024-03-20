<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Revisi_gambar extends Model
{
    public function project()
    {
        return $this->belongsTo(Project_menu::class, 'id_project');
    }
    protected $fillable = [
        'id_project',
        'status_revisi',
        'judul_revisi',
        'keterangan_revisi',
    ];
    use HasFactory;
}
