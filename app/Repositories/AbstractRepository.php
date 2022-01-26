<?php

namespace App\Repositories;

use App\Exceptions\DbException;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class AbstractRepository
{
    protected $model;

    public function __construct($model)
    {
        $this->model = $model;
    }


    public function fill($data)
    {
        return $this->model->fill($data);
    }

    public function all()
    {
        return $this->model->all();
    }

    public function find($id)
    {
        return $this->model->find($id);
    }

    public function findOrFail($id)
    {
        return $this->model->findOrFail($id);
    }

    public function where(string $column, $value)
    {
        return $this->model->where($column, $value);
    }

    public function whereIn(string $column, $arrayValues)
    {
        return $this->model->whereIn($column, $arrayValues);
    }

    public function orWhere(string $column, string $operador, $value)
    {
        return $this->model->orWhere($column, $value);
    }


    public function firstWhere(string $column, $value)
    {
        return $this->model->firstWhere($column, $value);
    }

    public function create($data)
    {
        return $this->model->create($data);
    }

    public function createMany($entities, $throwExceptionInParticularEntity = true, $rollbackAllInParticularException = true)
    {
        $arrayCreated = [];
        $arrayFail = [];
        try {
            DB::beginTransaction();
            foreach ($entities as $attributes) {
                try {
                    array_push($arrayCreated, $this->create($attributes));
                } catch (Exception $e) {
                    array_push($arrayFail, $attributes);

                    if (!$throwExceptionInParticularEntity) {
                        Log::channel('dbExceptions')->error(
                            "Erro ao inserir o registro em {$this->model->getTable()}: {$e->getMessage()}",
                            []
                        );
                    } else {
                        // throw new DbException("Erro ao inserir o registro em {$this->model->getTable()}.", $e, $this->model);
                    }
                }
            }
            DB::commit();
        } catch (Exception $e) {
            if ($rollbackAllInParticularException) {
                DB::rollback();
                $arrayCreated = [];
                $arrayFail = $entities;
            } else {
                DB::commit();
            }
        }

        return [
            'created' => $arrayCreated ?? [],
            'failed' => $arrayFail ?? [],
        ];
    }

    public function fullStackMany($entities, $referencia, $rollbackAllInParticularException = true)
    {
        $arrayCreated = [];
        $arrayUpdated = [];
        $arrayFail = [];
        $arrayId = [];
        try {
            DB::beginTransaction();

            foreach ($entities as $attributes) {

                if (isset($attributes[$this->model->getKeyName()])) {

                    $updated = $this->update($attributes[$this->model->getKeyName()], $attributes);
                    array_push($arrayUpdated, $updated);
                    array_push($arrayId, $updated[$this->model->getKeyName()]);
                } else {

                    $created = $this->create($attributes)->toArray();
                    array_push($arrayCreated, $created);
                    array_push($arrayId, $created[$this->model->getKeyName()]);
                }
            }
            $excluir = $this->model->where($referencia, '=', $attributes[$referencia])->whereNotIn($this->model->getKeyName(), $arrayId)->get();
            $excluir->map(function ($entity) {
                return $entity->delete();
            });
            DB::commit();
        } catch (Exception $e) {
            if ($rollbackAllInParticularException) {
                DB::rollback();
                $arrayCreated = [];
                $arrayUpdated = [];
                $arrayFail = $entities;
            } else {
                DB::commit();
            }
        }
        return [
            'created' => $arrayCreated ?? [],
            'update' => $arrayUpdated ?? [],
            'failed' => $arrayFail ?? [],
        ];
    }

    public function update($id, $attributes)
    {
        $entity = $this->findOrFail($id);
        $entity->update($attributes);

        return $entity;
    }

    public function updateMany($entities, $throwExceptionInParticularEntity = true, $rollbackAllInParticularException = true)
    {
        $arrayUpdated = [];
        $arrayFail = [];
        try {
            DB::beginTransaction();
            foreach ($entities as $attributes) {
                try {
                    $entity = $this->findOrFail($attributes[$this->model->getKeyName()]);
                    $entity->update($attributes);
                    array_push($arrayUpdated, $entity);
                } catch (Exception $e) {
                    array_push($arrayFail, $attributes);
                    if (!$throwExceptionInParticularEntity) {
                        Log::channel('dbExceptions')->error(
                            "Erro ao atualizar o registro {$attributes[$this->model->getKeyName()]}: {$e->getMessage()}",
                            []
                        );
                    } else {
                        // throw new DbException("Erro ao atualizar o registro em {$this->model->getTable()}.", $e, $this->model);
                    }
                }
            }
            DB::commit();
        } catch (Exception $e) {
            if ($rollbackAllInParticularException) {
                DB::rollback();
                $arrayUpdated = [];
                $arrayFail = $entities;
            } else {
                DB::commit();
            }
        }
        return [
            'updated' => $arrayUpdated ?? [],
            'failed' => $arrayFail ?? [],
        ];
    }

    public function delete($id)
    {
        $entity = $this->findOrFail($id);
        return $entity->delete($id);
    }

    public function paginate($id)
    {
        return $this->model->paginate($id);
    }
}
