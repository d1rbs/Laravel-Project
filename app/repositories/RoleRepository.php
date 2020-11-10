<?php


namespace App\repositories;


use App\Role;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

/**
 * Class RoleRepository
 * @package App\repositories
 */
class RoleRepository
{
    /* @var $request */
    private $request;

    /**
     * RoleRepository constructor.
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * create
     */
    public function create()
    {
        $user = new User();

        $user->name = $this->request->input('name');
        $user->status = $this->request->input('roles');
        $user->email = $this->request->input('email');
        $user->password = Hash::make($this->request->input('password'));

        $user->save();

        return redirect()->back();
    }

    /**
     * @return Role[]|\Illuminate\Database\Eloquent\Collection
     */
    public function getRole()
    {
        return  Role::all();
    }
}