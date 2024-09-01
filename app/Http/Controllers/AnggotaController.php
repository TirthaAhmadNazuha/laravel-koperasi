<?php

namespace App\Http\Controllers;

use App\Models\Anggota;

class AnggotaController extends TablesController
{
    public function __construct()
    {
        parent::__construct(
            Anggota::class,
            [
                'title' => 'Anggota',
                'columns' => ['nomor anggota', 'nama', 'wajib', 'pokok', 'saldo', 'tanggal dibuat', 'tanggal diupdate'],
                'name_route' => 'anggota',
            ]
        );
    }
}
