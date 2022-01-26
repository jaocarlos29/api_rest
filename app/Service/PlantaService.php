<?php


namespace App\Service;

use App\Repositories\Contracts\PlantaRepositoryInterface;


use App\Models\Plantas;
use Illuminate\Support\Facades\Hash;

class PlantaService
{

  protected $planta_repository;

  public function __construct(PlantaRepositoryInterface $planta_repository)
  {
    $this->planta_repository = $planta_repository;
  }

  public function index()
  {
    return $this->planta_repository->all();
  }

  public function show($id)
  {
    $planta =  $this->planta_repository->find($id);
    return $planta;
  }

  public function create($data)
  {
    return $this->planta_repository->create($data);
  }

  public function update($id, $data)
  {
    return $this->planta_repository->update($id, $data);
  }


  public function delete($id)
  {
    return $this->planta_repository->delete($id);
  }

}
