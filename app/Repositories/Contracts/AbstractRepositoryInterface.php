<?php

namespace App\Repositories\Contracts;

interface AbstractRepositoryInterface
{
  public function fill(array $data);

  public function all();

  public function find(int $id);

  public function findOrFail(int $id);

  public function where(string $column, $value);

  public function firstWhere(string $column, $value);

  public function whereIn(string $column, array $arrayValues);

  public function create(array $attributes);

  public function createMany(array $entities, $throwExceptionInParticularEntity = true, $rollbackAllInParticularException = true);

  public function update(int $id, array $attributes);

  public function updateMany(array $entities, $throwExceptionInParticularEntity = true, $rollbackAllInParticularException = true);

  public function fullStackMany(array $entities, string $referencia, $rollbackAllInParticularException = true);

  public function delete(int $id);

  public function paginate(int $id);
}
