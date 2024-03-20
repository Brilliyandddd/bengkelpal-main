<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project_menu extends Model
{
    public function aktivitas()
    {
        return $this->hasMany(Aktivitas::class, 'id_project');
    }
    public function revisigambar()
    {
        return $this->hasMany(Revisi_gambar::class, 'id_project');
    }
    protected $fillable = [
        'nama_project',
        'start_project',
        'finish_project',
        'keterangan_project',
    ];
    use HasFactory;

}
