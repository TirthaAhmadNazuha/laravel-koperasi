<?php

namespace App\Http\Controllers;

use App\Models\Pinjam;

class PinjamController extends TablesController
{
  public function __construct()
  {
    parent::__construct(
      Pinjam::class,
      [
        'title' => 'Pinjam',
        'columns' => [
          'nomor pinjam',
          'tangal',
          'nomor anggota',
          'jumlah pinjam',
          'kode kasir',
        ],
        'name_route' => 'pinjam',
      ]
    );
  }
}
