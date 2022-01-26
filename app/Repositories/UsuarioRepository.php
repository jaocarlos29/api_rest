<?php

namespace App\Repositories;

use App\Models\Usuarios;
use App\Repositories\Contracts\UsuarioRepositoryInterface;

class UsuarioRepository extends AbstractRepository implements UsuarioRepositoryInterface
{
  public function __construct(Usuarios $usuarios)
  {
    parent::__construct($usuarios);
  }

//   public function  findByCliente($id)
//   {
//     return $this->model->where('id_cliente', '=', $id)->get();
//   }
}
