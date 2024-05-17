<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MahasiswaModel extends Model
{
    use HasFactory;

    protected $table = 'mahasiswa';

    protected $fillable = [
        'user_id',
        'nama_mhs',
        'alamat_mhs',
        'email',
        'no_telp',
        'prodi',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
