<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Kyslik\ColumnSortable\Sortable;


class ModelLogin extends Model
{
    use HasFactory;
    use SoftDeletes;
    use Sortable;

    protected $table = 'users';
    protected $primaryKey = 'id';
    public $timestamps = true;

    public $fillable = ['id', 'name',];
    public $sortable = [
        'id', 'name', 'email', 'username', 'password', 'no_hp', 'alamat', 'level',
    ];

    public function peminjaman()
    {
        return $this->hasMany(ModelPeminjaman::class);
    }
}
