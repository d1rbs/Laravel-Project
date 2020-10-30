<?php


namespace App\repositories;


use App\Roles;

/**
 * Class RoleRepository
 * @package App\repositories
 */
class RoleRepository
{
    /**
     * @return Roles[]|\Illuminate\Database\Eloquent\Collection
     */
    public function getRole()
    {
        return  Roles::all();
    }
}