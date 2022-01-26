<?php

namespace App\Repositories;

use App\Models\Plantas;
use App\Repositories\Contracts\PlantaRepositoryInterface;

class PlantaRepository extends AbstractRepository implements PlantaRepositoryInterface

{
  public function __construct(Plantas $plantas)
  {
    parent::__construct($plantas);
  }

//   public function  findByCliente($id)
//   {
//     return $this->model->where('id_cliente', '=', $id)->get();
//   }
}
