<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tool extends Model
{
    protected $fillable = [
        'nama_tools',
        'jumlah_tools',
        'status_tools',
        'kalibrasi_date',
    ];
    use HasFactory;
}
