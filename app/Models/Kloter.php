<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kloter extends Model
{
    use HasFactory;
    protected $fillable = ['nama', 'id_jam', 'id_ruangan', 'id_tutor'];

    public function sesijam()
    {

        return $this->belongsTo(Jam::class, 'id_jam');
    }

    public function namaRuangan()
    {

        return $this->belongsTo(Ruangan::class, 'id_ruangan');
    }

    public function namaTutor()
    {

        return $this->belongsTo(Tutor::class, 'id_tutor');
    }
}
