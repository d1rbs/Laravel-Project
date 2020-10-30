<?php


namespace App\services;

use App\repositories\RoleRepository;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

/**
 * Class RoleService
 * @package App\services
 */
class RoleService
{
    /* @var $request */
    private $request;

    /* @var RoleRepository */
    private $roleRepository;

    /**
     * RoleService constructor.
     * @param RoleRepository $roleRepository
     */
    public function __construct(Request $request, RoleRepository $roleRepository)
    {
        $this->request = $request;
        $this->roleRepository = $roleRepository;
    }

    /**
     * @return \App\Roles[]|\Illuminate\Database\Eloquent\Collection
     */
    public function create()
    {
        $user = new User();
        $user->name = $this->request->input('name');
        $user->status = $this->request->input('roles');
        $user->email = $this->request->input('email');
        $user->password = Hash::make($this->request->input('password'));

        $user->save();
    }

    /**
     * @return \App\Roles[]|\Illuminate\Database\Eloquent\Collection
     */
    public function getRole()
    {
        return $this->roleRepository->getRole();
    }
}