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
        $planta = $this->planta_repository->all();
        $planta->map(function ($plantas) {
            return $plantas->plantaTalhao;
        });

        return $planta;
    }

    public function show($id)
    {
        $planta =  $this->planta_repository->find($id);
        $planta->plantaTalhao;
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
