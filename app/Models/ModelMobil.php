<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Kyslik\ColumnSortable\Sortable;


class ModelMobil extends Model
{
    use HasFactory;
    use SoftDeletes;
    use Sortable;

    protected $table = 'mobil';
    protected $primaryKey = 'id_mobil';
    public $timestamps = true;

    public $fillable = [
        'id_mobil', 'nama_mobil', 'merk_mobil', 'tahun_mobil', 'plat_mobil',
        'bahan_bakar', 'transmisi', 'kursi', 'harga_sewa', 'keterangan',
    ];

    public $sortable = [
        'id_mobil', 'nama_mobil', 'merk_mobil', 'tahun_mobil', 'plat_mobil',
        'bahan_bakar', 'transmisi', 'kursi', 'harga_sewa', 'keterangan',
    ];

    public function peminjaman2()
    {
        return $this->hasMany(ModelPeminjaman::class);
    }
}
