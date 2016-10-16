<?php


namespace CodePress\CodeUser\Repository;


use CodePress\CodeDatabase\Contracts\CriteriaCollection;
use CodePress\CodeDatabase\Contracts\RepositoryInterface;

interface RoleRepositoryInterface extends RepositoryInterface, CriteriaCollection
{
    public function addPermissions($id, array $permissions);
    public function lists($column, $key = null);
}