<?php


namespace App\services;

use App\repositories\RoleRepository;

/**
 * Class RoleService
 * @package App\services
 */
class RoleService
{
    /* @var RoleRepository */
    private $roleRepository;

    /**
     * RoleService constructor.
     * @param RoleRepository $roleRepository
     */
    public function __construct(RoleRepository $roleRepository)
    {
        $this->roleRepository = $roleRepository;
    }

    /**
     * @return \App\Role[]|\Illuminate\Database\Eloquent\Collection
     */
    public function create()
    {
       return $this->roleRepository->create();
    }

    /**
     * @return \App\Role[]|\Illuminate\Database\Eloquent\Collection
     */
    public function getRole()
    {
        return $this->roleRepository->getRole();
    }
}