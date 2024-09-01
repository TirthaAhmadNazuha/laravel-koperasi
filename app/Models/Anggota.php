<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anggota extends Model
{
    use HasFactory;
    protected $table = "tbl_anggota";
    protected $primaryKey = 'no_anggota'; // Specify the primary key column
    public $incrementing = false; // Set to false if your primary key is not an auto-incrementing integer
    protected $keyType = 'string';
    protected $fillable = [
        "no_anggota",
        "nama",
        "wajib",
        "pokok",
        "saldo",
    ];

}
