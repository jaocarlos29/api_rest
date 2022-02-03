<?php


namespace App\Service;

use App\Repositories\Contracts\TalhaoRepositoryInterface;


use App\Models\Talhao;
use Illuminate\Support\Facades\Hash;

class TalhaoService
{

    protected $talhao_repository;

    public function __construct(TalhaoRepositoryInterface $talhao_repository)
    {
        $this->talhao_repository = $talhao_repository;
    }

    public function index()
    {
        $talhao = $this->talhao_repository->all();
        $talhao->map(function ($talhaos) {
            return $talhaos->TalhaoUsuario;
        });

        return $talhao;
    }

    public function show($id)
    {
        $talhao =  $this->talhao_repository->find($id);
        $talhao->TalhaoUsuario;
        return $talhao;
    }

    public function create($data)
    {
        return $this->talhao_repository->create($data);
    }

    public function update($id, $data)
    {
        return $this->talhao_repository->update($id, $data);
    }

    public function delete($id)
    {
        return $this->talhao_repository->delete($id);
    }
}
