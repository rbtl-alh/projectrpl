<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donor extends Model
{
    use HasFactory;
    protected $table = 'donors';
    protected $fillable = [
    'user_id',
    'nama',
    'jenis_kelamin',
    'goldar',
    'usia',
    'alamat',
    'status_vaksin',
    ];

    public function user() {
        return $this->belongsTo('App\Models\User', 'user_id');
    }
}
