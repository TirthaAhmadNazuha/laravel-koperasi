<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pinjam extends Model
{
  use HasFactory;
  protected $table = "tbl_pinjam";
  protected $primaryKey = 'no_pinjam'; // Specify the primary key column
  public $incrementing = false; // Set to false if your primary key is not an auto-incrementing integer
  protected $keyType = 'string';
  protected $fillable = [
    "no_pinjam",
    "tangal",
    "no_anggota",
    "jml_pinjam",
    "kodeksr",
  ];

}
