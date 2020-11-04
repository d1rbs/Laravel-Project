<?php


namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Role;
use Illuminate\Http\Request;

/**
 * Class RoleController
 * @package App\Http\Controllers\Admin
 */
class RoleController extends Controller
{
    /**
     * RoleController constructor.
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Illuminate\Validation\ValidationException]
     */
    public function create()
    {
        if($this->request->isMethod('post'))
        {
            $this->validate($this->request, [
                'name' => 'required|min:3|max:200',
            ],[
                'name.required' => 'Потрібно обовязково ввести дані в це поле',
                'name.min' => 'мін 3 букви!',
            ]);

            $role = new Role();
            $role->name = $this->request->input('name');

            $role->save();
        }
        return view('admin.role.create');
    }

}