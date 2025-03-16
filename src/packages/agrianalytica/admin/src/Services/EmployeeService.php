<?php

namespace Agrianalytica\Admin\Services;

use Agrianalytica\Admin\Repositories\EmployeeRepository;
use Illuminate\Support\Facades\Hash;

class EmployeeService
{
    protected $repository;

    public function __construct(EmployeeRepository $repository)
    {
        $this->repository = $repository;
    }

    public function getFiltered(?string $search, ?string $status, ?int $role, int $perPage = 10)
    {
        return $this->repository->getFiltered($search, $status, $role, $perPage);
    }

    public function getById(string $id)
    {
        return $this->repository->findById($id);
    }

    public function create(array $data)
    {
        return $this->repository->create($data);
    }

    public function update(string $id, array $data)
    {
        return $this->repository->update($id, $data);
    }

    public function delete(string $uuid)
    {
        return $this->repository->delete($uuid);
    }

    public function restore(string $uuid)
    {
        return $this->repository->restore($uuid);
    }

    public function getDeleted()
    {
        return $this->repository->getDeleted();
    }

    public function forceDeleteEmployee($id)
    {
        return $this->repository->forceDelete($id);
    }

    public function getArchived()
    {
        return $this->repository->getArchived();
    }
}
