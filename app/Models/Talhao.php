<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Talhao extends Model
{
    use HasFactory;

    protected $table = 'talhaos';
    protected $primaryKey = 'id';

    protected $fillable = [
        'usuario_id',
        'nome'
    ];

    public function TalhaoUsuario()
    {
        return $this->belongsTo(Usuarios::class, 'usuario_id');
    }


}
