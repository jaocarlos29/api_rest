<?php

namespace App\Repositories;

use App\Models\Talhao;
use App\Repositories\Contracts\TalhaoRepositoryInterface;

class TalhaoRepository extends AbstractRepository implements TalhaoRepositoryInterface

{
    public function __construct(Talhao $talhaos)
    {
        parent::__construct($talhaos);
    }

    //   public function  findByCliente($id)
    //   {
    //     return $this->model->where('id_cliente', '=', $id)->get();
    //   }
}
