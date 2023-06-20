<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\Mahasiswa as Authenticable;
use Illuminate\Notifications\Notifiable;

class Mahasiswa extends Model
{
    protected $table="mahasiswa";
    public $timestamps=false;
    // protected $primaryKey='id';
    use HasFactory;

    protected $fillable = [
        'Nim',
        'Nama', 
        'Kelas',
        'Jurusan',
        'No_Handphone',
        'Email',
        'Tanggal_Lahir',
    ];

    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }

    public function matakuliah()
    {
        return $this->belongsToMany(Matakuliah::class, 'mahasiswa_matakuliah', 'mahasiswa_id', 'matakuliah_id')->withPivot('nilai');
    }

    public function mahasiswa_matakuliah()
    {
        return $this->belongsToMany(Matakuliah::class, 'mahasiswa_matakuliah', 'mahasiswa_id', 'matakuliah_id')->withPivot('nilai');
    }

}
