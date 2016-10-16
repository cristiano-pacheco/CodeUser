<?php


namespace CodePress\CodeUser\Repository;


use CodePress\CodeDatabase\AbstractRepository;
use CodePress\CodeUser\Models\Role;

class RoleRepositoryEloquent extends AbstractRepository implements RoleRepositoryInterface
{
    private $permissionRepository;

    public function __construct(PermissionRepositoryInterface $permissionRepository)
    {
        parent::__construct();

        $this->permissionRepository = $permissionRepository;
    }

    public function model()
    {
        return Role::class;
    }

    public function addPermissions($id, array $permissionsID)
    {
        $model = $this->find($id);

        foreach ($permissionsID as $valor) {
            $model->permissions()->save($this->permissionRepository->find($valor));
        }

        return $model;
    }

    public function lists($column, $key = null)
    {
        $this->applyCriteria();

        return $this->model->pluck($column, $key);
    }
}