<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelTransaksi extends Model
{
    use HasFactory;

    public $table = 'transaksi_mobil';
    protected $primaryKey = 'id_transaksi';

    // protected $fillabel = [
    //     'id_transaksi', 'date_transaksi', 'time_transaksi', 'durasi', 'totalbayar', 'gambar_nik', 'gambar_bill',
    //     'email', 'name', 'alamat', 'no_hp', 'nama_mobil', 'plat_mobil', 'seat', 'harga_sewa'
    // ];

    protected $fillable = [
        'id_transaksi', 'date_transaksi', 'time_transaksi', 'name', 'nama_mobil',
    ];
}
