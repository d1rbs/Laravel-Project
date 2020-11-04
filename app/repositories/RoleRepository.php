<?php


namespace App\repositories;


use App\Role;

/**
 * Class RoleRepository
 * @package App\repositories
 */
class RoleRepository
{
    /**
     * @return Role[]|\Illuminate\Database\Eloquent\Collection
     */
    public function getRole()
    {
        return  Role::all();
    }
}