<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AbsensiMember extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_kloter',
        'id_member',
        '1',
        '2',
        '3',
        '4',
        '5',
        '6',
        '7',
        '8',
        '9',
        '10',
        'mid_test',
        'final_test',
        'avg',
        'score',
    ];

    public function kloter()
    {
        return $this->belongsTo(Kloter::class);
    }

    public function member()
    {
        return $this->belongsTo(Member::class);
    }
}
