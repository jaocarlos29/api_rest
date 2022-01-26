<?php


namespace App\Service;

use App\Repositories\Contracts\UsuarioRepositoryInterface;


use App\Models\Usuario;
use Illuminate\Support\Facades\Hash;

class UsuarioService
{

  protected $usuario_repository;

  public function __construct(UsuarioRepositoryInterface $usuario_repository)
  {
    $this->usuario_repository = $usuario_repository;
  }

  public function index()
  {
    return $this->usuario_repository->all();
  }

  public function show($id)
  {
    $usuario =  $this->usuario_repository->find($id);
    return $usuario;
  }

  public function create($data)
  {
    return $this->usuario_repository->create($data);
  }

  public function update($id, $data)
  {
    return $this->usuario_repository->update($id, $data);
  }


  public function delete($id)
  {
    return $this->usuario_repository->delete($id);
  }

}
