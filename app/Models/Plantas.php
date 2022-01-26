<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plantas extends Model
{
    use HasFactory;

    protected $table = 'plantas';
    protected $primaryKey = 'id';

    protected $fillable = [
        'talhao_id',
        'ponto_1',
        'ponto_2',
        'ponto_3',
        'ponto_4',
        'ponto_5',
        'ponto_6'
    ];

    public function plantaTalhao()
    {
        return $this->belongsTo(Talhao::class, 'id');
    }
}
