<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\services\RoleService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Role;


/**
 * Class RegisterController
 * @package App\Http\Controllers\Admin
 */
class RegisterController extends Controller
{
    /* @var Request */
    private $request;

    /* @var $roleService */
    private $roleService;

    /**
     * RegisterController constructor.
     * @param Request $request
     * @param RoleService $roleService
     */
    public function __construct(Request $request, RoleService $roleService)
    {
        $this->request = $request;
        $this->roleService= $roleService;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Illuminate\Validation\ValidationException
     */
    protected function create()
    {
        if ($this->request->isMethod('post')) {
            /* ---------------------Validator-----------------------*/
            $this->validate($this->request, [
                'name' => ['required', 'string', 'max:255'],
                'roles' => ['integer','between:0,12'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => ['required', 'string', 'min:8', 'confirmed'],
            ]);
            $this->roleService->create();
        }

        $roles_lists = $this->roleService->getRole();
        $roles_listsJson = json_encode($roles_lists);
        return view('admin.users.register',[
            'roles_lists' => $roles_lists,
        ]);

    }

}
